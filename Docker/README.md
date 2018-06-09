# 入门文档

## 目的
1. 怎么在一个已有的镜像上开发?
2. 怎么调试，发布打镜像?
3. Docker不会用？
 
## [搭建环境](1. 搭建环境.md)  
一、Docker安装：Windows 10   
[点击链接下载 Stable 或 Edge 版本的 Docker for Windows](https://docs.docker.com/docker-for-windows/install/#download-docker-for-windows)  
下载好之后双击 Docker for Windows Installer.exe 开始安装。

二、镜像加速器
1. [推荐] Daocloud镜像加速器: https://www.daocloud.io/mirror#accelerator-doc（自行注册）  
2. 阿里云加速器: https.aliyuncs.com

三、设置host  
180.96.14.147 xx.docker.com  
xx.docker.com和加速器一样，加入到Registy mirrors.  

四、windows需要设置电脑密码，需要提供给Docker，文件盘的访问权限

## 已有镜像上开发  

一、项目安装  
1. git clone xxx
2. 安装依赖: composer install
3. cd items
4. docker-compose up
5. 访问：localhost，出现json格式返回即成功。

## 新项目开发
1. 配置Dockerfile文件（用于镜像构建）
2. 配置docker-compose.yml文件（用于调试）

## 如何调试

一、 docker-compose.yml 文件  
1. 端口对应：通过访问本机的端口来访问容器的中的端口。
在文件中可以查看端口对应关系，一般为80:80
第一个是：指定主机port，第二个为指定容器port

2. 代码：把本地的代码放到容器中
volumes:
   - ./:/var/www/items
把当前目录挂载到镜像中的/var/www/items的目录

二、本地修改会自动同步到容器中，容器中的代码会自动重新执行，但是会比较慢。  

三、如何访问容器中的代码？ 
```
docker ps //第一列为容器id  
docker exec -it <container_id> bash // 进入容器
```

## 打包镜像上线
1. docker build -t services/items:v1 .  
 1.1 -t: tag
 1.2 构建镜像会缓存代码，加参数--no-cache
2. docker tag services/items:v1 harbor.oneitfarm.com/services/items:v1
3. docker push harbor.oneitfarm.com/services/items:v1


## 基本操作

一、[镜像操作](3. 镜像操作.md)
```
# 列出本机的所有 image 文件。
$ docker image ls

# 删除 image 文件
$ docker image rm [imageName]

# 获取镜像
$ docker pull [选项] [Docker Registry 地址[:端口号]/]仓库名[:标签]
```

二、[容器操作](4. 容器操作.md)

```
# 新建并启动
$ docker run -it ubuntu:14.04 bash
$ -i  保持容器的输入流
$ -t  打开一个虚拟终端

# 列出本机正在运行的容器
$ docker container ls

# 列出本机所有容器，包括终止运行的容器
$ docker container ls --all

# 生成一个正在运行的容器实例
$ docker container run
$ docker container run -it centos:latest bash

# 进入一个容器
$ docker attach [containerID]
$ docker exec -it <container> bash // 推荐使用

# 停止
$ docker container kill [containerID]

# 删除
$ docker container rm [containerID]
```

## [资源列表](7. 资源列表.md)

## [常见问题](8. 常见问题.md)