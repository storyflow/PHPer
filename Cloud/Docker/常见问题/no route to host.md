##  问题

docker 容器访问宿主机出现报错：no route to host



## 解决方案

### 关闭防火墙

有时候在公司内部可能不让关闭

### 指定网桥IP解决

docker默认是172.17网段，和公司内网冲突了，自定义 subnet 避开公司内网网段就可以了

https://valleylord.github.io/post/201601-docker-network/

### 采用公司内网

遇到的问题是802.1x，用的是公司wifi，无法通过认证

采用公司内网即可解决

[https://baike.baidu.com/item/802.1x%E8%BA%AB%E4%BB%BD%E8%AE%A4%E8%AF%81](https://baike.baidu.com/item/802.1x身份认证)



