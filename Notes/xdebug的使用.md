
## 原理
运行xdebug需要客户端IDE（phpstorm）、远程服务器配合，首先是客户端配置好端口，发送debug请求，请求会通过浏览器或者IDE的http请求，携带特定的参数发送到服务端，服务端收到请求后，发现这是一个xdebug请求，则与IDE建立dpgp连接，当遇到断点时候，返回调试信息给IDE

![](https://xdebug.org/images/docs/dbgp-setup2.gif)

## 安装xdebug扩展
https://xdebug.org/download.php

## 远程环境配置
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

## phpstorm 配置配置Debug
#### 1. 配置deployment  

![](https://pic4.zhimg.com/80/v2-169647ab9bc2bf755f572ef4b0ff4116_hd.jpg)
![](https://pic4.zhimg.com/80/v2-4e2f306aed7f097d5a18d3d3fb6ae369_hd.jpg)

#### 2. 配置 PHP servers

![](https://pic2.zhimg.com/v2-af7cf45a546151d34a8d906554c800a9_r.jpg)

#### 3. 配置PHP debug

![](https://pic4.zhimg.com/80/v2-9b01a2113878d88f206c0e231aea980e_hd.jpg)

校验代码 
https://gist.github.com/han8gui/231ba75c8989ffe6dfab3831c0dcd58a

#### 4. 配置调试选项 or 安装插件


![](https://pic2.zhimg.com/80/v2-33ebe2bbd4a870caf584980c157cd624_hd.jpg)

命令行
```
export XDEBUG_CONFIG="idekey=session_name"
php myscript.php
```
## 调试
程序运行到该断点时，程序会停留在该行，但该行本身不会执行。
