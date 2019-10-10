## 问题

前端页面加载css，和js文件的时候，经常出现`ERR_CONTENT_LENGTH_MISMATCH`的报错情况。

### 背景

为什么nginx要访问`proxy_temp`文件夹呢，因为`proxy_temp`是nginx的缓存文件夹，我的css和js文件过大了，所以nginx一般会从缓存里面去拿，而不是每次都去原地址直接加载。

## 参考资料

[ERR_CONTENT_LENGTH_MISMATCH解决方法](https://blog.csdn.net/Mr_OOO/article/details/81068369)

