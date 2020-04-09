## 定义

APCu是PHP内置的用户缓存扩展，用来补充（用户缓存指的是PHP代码将数据写入缓存，通过key和value的当时插入和读取的这种数据）。

## 安装

扩展下载地址：https://pecl.php.net/package/APCu，编译安装此处就不再赘述了

安装完成后修改php.ini

```
extension=apcu.so
apc.shm_size=128M
apc.ttl=60s
```

## 关键函数说明

```
apcu_add -数据存储中缓存的新变
apcu_cache_info -检索缓存的信息从APCu的数据存储 获取数据存储列表(不会返回value),只有定义值的信息
apcu_cas更新旧值和新值
apcu_clear_cache -清除缓存的
apcu_dec -减少存储的值(必须数值型)
apcu_delete -删除存储变量从缓存
apcu_entry -自动读取或生成一个缓存条目
apcu_exists -检查项目存在
apcu_fetch从缓存取存储变量
apcu_inc增加存储的值(必须数值型)
apcu_sma_info -检索高招共享内存分配信息
apcu_store -数据存储区中的缓存变量
```



## 优化内容

大key