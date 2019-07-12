```
# 下载
$ wget https://dev.mysql.com/get/mysql57-community-release-el7-11.noarch.rpm
# 安装 mysql 源
$ yum localinstall mysql57-community-release-el7-11.noarch.rpm
# 安装 MySQL
$ yum install -y mysql-community-server
# 启动mysql
$ systemctl start mysqld
```