## 原理

1、IDE（比如 PhpStorm ，下文所述的客户端）中已经集成了一个遵循 BGDp 的 Xdebug 插件。当要 debug 的时候，点击一些 IDE 的某个按钮，启动这个插件。该插件会启动一个 9000 的端口监听远程服务器发过来的 debug 信息。

> phpstorm 中，开启 / 关闭的位置为：工具栏 > Run > Start / Stop Listening for PHP Xdebug Connetions

2、浏览器向 Httpd 服务器发送一个带有 XDEBUG_SESSION_START 参数的请求，服务器收到这个请求之后交给后端的 PHP（已开启 xdebug 模块）进行处理。

3、Php 看到这个请求是带了 XDEBUG_SESSION_START 参数，就告诉 Xdebug，“嘿，我要 debug 喔，你准备一下”。这时，Xdebug 会向来源 ip 客户端的 9000 端口（默认是 9000 端口）发送一个 debug 请求，然后客户端的 9000 端口响应这个请求，那么 debug 就开始了。

>  这里通知客户端其实有两种方式，根据 xdebug 的配置 xdebug.remote_connect_back = 0 | 1 使用不同的通知方式，下文会详细介绍

4、Php 知道 Xdebug 已经准备好了，那么就开始开始一行一行的执行代码，但是每执行一行都会让 Xdebug 过滤一下，Xdebug 在过滤每一行代码的时候，都会暂停代码的执行，然后向客户端的 9000 端口发送该行代码的执行情况，等待客户端的决策（是一句代码还是下一个断点待）。。

5、相应，客户端（IDE）收到 Xdebug 发送过来的执行情况，就可以把这些信息展示给开发者看了，包括一些变量的值等。同时向 Xdebug 发送下一步应该什么。

