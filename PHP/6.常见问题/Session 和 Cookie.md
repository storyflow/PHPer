# Session vs cookie

1、cookie存在客户端，session保存到服务端

2、有效期不同

3、隐私策略不同：cookie不怎么安全

4、存储大小不同

## 多服务共享session
1. 缓存memcache
2. cookie
3. 基于mysql
4. 共享目录NFS

## 常见问题
1. 禁止了浏览器 cookie，session 还可以用吗？
可以，在每条url中都加上session字段。设置php.ini中的session.use_trans_sid = 1或者在PHP编译时打开–enable-trans-sid选项，让PHP自动通过URL传递session id。

## 参考资料
* [手册](http://php.net/manual/zh/features.cookies.php)
* [聊一聊 cookie](https://segmentfault.com/a/1190000004556040)