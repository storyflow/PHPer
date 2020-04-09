
## 定义

#### CGI
通用网关接口（Common Gateway Interface/CGI）是一种重要的互联网技术，可以让一个客户端，从网页浏览器向执行在网络服务器上的程序请求数据。CGI描述了服务器和请求处理程序之间传输数据的一种标准

#### FastCGI
1. 快速通用网关接口（Fast Common Gateway Interface／FastCGI）是一种让交互程序与Web服务器通信的协议。FastCGI是早期通用网关接口（CGI）的增强版本。

2. 与CGI的区别
FastCGI致力于减少网页服务器与CGI程序之间交互的开销，从而使服务器可以同时处理更多的网页请求。
FastCGI:进程池，而CGI针对每个请求都启动一个worker.

#### FPM
FastCGI进程管理器

#### php-cgi
PHP的解释器是php-cgi,php-cgi只是个CGI程序（cgi协议的解析器），他自己本身只能解析请求，返回结果，不会进程管理。

## 流程
```
 www.example.com
        |
        |
      Nginx
        |
        |
      Ngnix通过fastcgi协议将请求代理到PHP-FPM
        |
        |
      php-fpm启动一个fastcgi进程，监听127.0.0.1:9000
        |
        |
      php-fpm 接收到请求，启用phpcgi进程处理请求
        |
        |
      php-fpm 处理完请求，返回给nginx
        |
        |
```

## 模块

### Apache模块（mod_php）
1. PHP解释器被嵌入在服务器上产生的每个Apache进程中。这样每个Apache工作人员都能够处理和执行PHP脚本本身，而不需要处理任何外部进程;

2. 优点
- 由Apache执行的PHP代码。
- 无需外部过程。
- PHP重量级网站的性能非常好。
- PHP配置设置可以在.htaccess指令中定制。

3. 缺点
- 使每个Apache进程足迹更大 - 意味着使用更多的RAM。
- 为非PHP内容加载PHP解释器。
- PHP脚本创建的文件通常由Web服务器拥有，因此您以后无法通过FTP编辑它们。

### CGI

1. 使用CGI应用程序执行PHP脚本是在Web服务器上运行应用程序的传统方式，它效率很低且很少使用。它最初是在20世纪90年代推出的，但被认为效率太低，无法用于非小型站点以外的任何其他应用。在CGI上运行应用程序的一个好处是它可以将代码执行与Web服务器分离开来，从而增强了安全性。

2. 优点
由于PHP代码执行与Web服务器隔离，因此安全性优于mod_php（以上）。

3. 缺点
运行应用程序的传统方式。
表现非常差。

## FastCGI
FastCGI是作为PHP Apache模块和CGI应用程序之间的中间地位而引入的。它允许脚本由Web服务器之外的解释器执行，包括CGI的安全优势，但不包括CGI的低效率。

2. 优点
由于PHP代码执行与Web服务器隔离，从而提高了安全性。
静态内容将不会被PHP解释器处理。
允许您的FTP用户管理文件，而不会随后更改权限。

3. 缺点
不能在.htaccess中使用PHP指令。这是许多流行的脚本所期望的。
需要从Web服务器传递PHP请求。


## 参考资料
* [搞不清FastCgi与PHP-fpm之间是个什么样的关系](https://segmentfault.com/q/1010000000256516)
* [Which PHP mode? Apache vs CGI vs FastCGI](https://blog.layershift.com/which-php-mode-apache-vs-cgi-vs-fastcgi/)
* [php-cgi](https://www.cc.ncu.edu.tw/document/SNMG/php-cgi.pdf)