## 为什么要用？
1. 方便联调：
    和客户端一起联调，是die(); exit(); 会影响其他人员是使用。
2. 关注数据变化：
    正常情况下，我们在调试和开发时，更关注数据的变化。频繁断点、效率比较低。
3. 简单：
    之前的开发自己比较懒，一直没用，用起来发现很简单。
## 原理
运行xdebug需要客户端IDE（phpstorm）、远程服务器配合，首先是客户端配置好端口，发送debug请求，请求会通过浏览器或者IDE的http请求，携带特定的参数发送到服务端，服务端收到请求后，发现这是一个xdebug请求，则与IDE建立dpgp连接，当遇到断点时候，返回调试信息给IDE



![image | left](https://xdebug.org/images/docs/dbgp-setup2.gif "")


* 服务器的IP是10.0.1.2，端口80上有HTTP
* IDE位于未知IP上，因此[xdebug.remote\_connect\_back](https://xdebug.org/docs/all_settings#remote_connect_back)设置为1
* IDE侦听端口9000，因此[xdebug.remote\_port](https://xdebug.org/docs/all_settings#remote_port)设置为9000
* 发出HTTP请求，Xdebug从HTTP头中检测IP地址
* Xdebug连接到端口9000上检测到的IP（10.0.1.42）
* 调试运行，提供HTTP响应

## 流程



![7c8bad15595a7ed97230e075124cb9ff.png | center | 827x436](https://cdn.nlark.com/yuque/0/2018/png/103176/1536630028850-6b8b1d43-596f-41b0-8f3c-4fca581ed938.png "")


### 1. 安装xdebug扩展
[https://xdebug.org/download.php](https://xdebug.org/download.php)

### 2. 远程环境配置
```
zend_extension=xdebug.so
xdebug.idekey=PHPSTORM
xdebug.remote_connect_back = 1
//如果开启此，将忽略下面的 xdebug.remote_host 的参数

xdebug.remote_host=192.168.x.x
//注意这里是，客户端的ip<即IDE的机器的ip,不是你的web server>

xdebug.remote_enable=on
xdebug.remote_port = 9001
//注意这里是，客户端的端口<即IDE的机器的ip,不是你的web server>

xdebug.remote_handler = dbgp
xdebug.auto_trace = 1
xdebug.remote_log = /tmp/xdebug.log
```

### 3. 配置deployment  



![v2-169647ab9bc2bf755f572ef4b0ff4116_hd.jpg | center | 720x641](https://cdn.nlark.com/yuque/0/2018/jpeg/103176/1536630853918-79a6fc79-8219-4065-9fcb-ed54408f97b8.jpeg "")

### 4. Phpstorm Debug配置



![企业微信截图_153663027822.png | center | 827x571](https://cdn.nlark.com/yuque/0/2018/png/103176/1536630313482-89d021c9-e4c2-47db-b321-dce8a8e450d8.png "")


### 5. 开启phpstorm 数据监听


![企业微信截图_15366307559249.png | center | 446x79](https://cdn.nlark.com/yuque/0/2018/png/103176/1536630767918-66fe3bd7-36da-41c0-aefc-2139a35269ec.png "")


### 6. 设置 debug session

debug session 的工具的目的是设置一个cookie, 让每次发送数据的时候都会携带这个 cookie, 从而识别监听.

6.1) 安装工具
[https://chrome.google.com/webstore/detail/xdebug-helper/eadndfjplgieldjbigjakmdgkmoaaaoc](https://chrome.google.com/webstore/detail/xdebug-helper/eadndfjplgieldjbigjakmdgkmoaaaoc)

6.2) 点击图标设置


![企业微信截图_15366310693718.png | center | 202x226](https://cdn.nlark.com/yuque/0/2018/png/103176/1536631091957-8c6806b0-29ec-4aeb-8f50-687a51d3ad1b.png "")


6.3） 已经设置了cookie, Key 是 `XDEBUG_SESSION`, 值是 `PHPSTORM`


![企业微信截图_153663027822.png | center | 824x446](https://cdn.nlark.com/yuque/0/2018/png/103176/1536631205993-bd06e1ff-f9c7-4d1e-8edd-b0cc1592775b.png "")


### 7. 运行页面


![企业微信截图_15365753413668.png | center | 622x234](https://cdn.nlark.com/yuque/0/2018/png/103176/1536631295449-4fe998cf-8812-402b-980f-790e90df4c87.png "")



## 其他调试方式

上面的模式有个缺点，插件是针对于一个标签页
快捷键：
Mac: Ctrl+Shift+X Windows:Alt+Shift+X

### 内部模式
#### __1. 设置 web 访问的服务器__


![企业微信截图_15366324012641.png | center | 827x571](https://cdn.nlark.com/yuque/0/2018/png/103176/1536632468788-c06b4fd9-c68a-4210-99a9-731b892bb497.png "")


#### 2. 配置调试页面
我们这里创建的调试页面的类型是`PHP Web Page`, 服务器选择的是刚才已经建立好的服务器


![企业微信截图_15366324012641.png | center | 827x554](https://cdn.nlark.com/yuque/0/2018/png/103176/1536632586232-8de4ff11-7bea-4595-b0ff-d95a0ffa8d7d.png "")


#### 3. 运行测试页面


![企业微信截图_15366324012641.png | center | 287x97](https://cdn.nlark.com/yuque/0/2018/png/103176/1536632899220-90af138c-2aa7-47d2-a3f9-9167f76b37c8.png "")


自动生成：XDEBUG\_SESSION\_START
[http://example.com/?XDEBUG\_SESSION\_START=13608](http://example.com/?XDEBUG_SESSION_START=13608)

### Fiddler工具调试
```plain
if (oSession.host == "xxxx")
{
    var sCookie = oSession.oRequest["Cookie"] + ';XDEBUG_SESSION=PHPSTORM;';
    oSession.oRequest.headers.Add("Cookie", sCookie);       
}
```

### 命令行
```plain
export XDEBUG_CONFIG="idekey=PHPSTORM"
php myscript.php
```
### 多人开发模式
[https://derickrethans.nl/debugging-with-multiple-users.html](https://derickrethans.nl/debugging-with-multiple-users.html)
插件下载地址：[http://code.activestate.com/komodo/remotedebugging/](http://code.activestate.com/komodo/remotedebugging/)

## 其他

### 1. 查看兼容性
第一次运行的时候可以通过 phpstorm 自带的工具来检查配置的兼容性.
`Run > Web Server Debug Validation`
校验代码 
：https://gist.github.com/han8gui/231ba75c8989ffe6dfab3831c0dcd58a

### 2. debug 帮助面板说明


![2cd9bf236c0d2ef6f143943fe82c240a.png | center | 827x201](https://cdn.nlark.com/yuque/0/2018/png/103176/1536633142576-1e57ddb6-6068-468c-a778-cf6f901e6bea.png "")

__左侧__
绿色三角形 ： `Resume Program`，表示將继续执行，直到下一个中断点停止。
红色方形 ： `Stop`，表示中断当前程序调试。

__上方__
第一个图形示 ： `Step Over`，跳过当前函数。
第二个图形示 ： `Step Into`，进入当前函数內部的程序（相当于观察程序一步一步执行）。
第三个图形示 ： `Force Step Into`，強制进入当前函数內部的程序。
第四个图形示 ： `Step Out`，跳出当前函数內部的程式。
第五个图形示 ： `Run to Cursor`，定位到当前光标。

## 参考文章
[https://segmentfault.com/a/1190000011387666](https://segmentfault.com/a/1190000011387666)

## 其他问题
1. 需要关闭防火墙

