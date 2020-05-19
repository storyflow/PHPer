## 时间

    total_time //获得用秒表示的上一次传输总共的时间，包括DNS解析、TCP连接等。
    namelookup_time //获得用秒表示的从最开始到域名解析完毕的时间。
    connect_time //获得用秒表示的从最开始直到对远程主机（或代理）的连接完毕的时间。
    pretransfer_time //获得用秒表示的从最开始直到文件刚刚开始传输的时间。
    starttransfer_time //获得用秒表示的从最开始到第一个字节被curl收到的时间。
    redirect_time //获得所有用秒表示的包含了所有重定向步骤的时间，包括DNS解析、连接、传输前（pretransfer)和在最后的一次传输开始之前。

------------------------------------------------


## 常见问题

1. curl用的多进程还是多线程，还是I/O复用？
多线程
2. total_time 远大于 timeout
3. CURLOPT_NOSIGNAL，域名解析就不会受超时控制。



异步请求中的超时
https://github.com/guzzle/guzzle/issues/2269