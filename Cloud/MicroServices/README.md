# 微服务

## 定义
1. 一种架构风格，将单体应用划分成一组小的服务，服务之间相互协作，实现业务功能
2. 每个服务运行在独立的进程中，服务间采用轻量级的通信机制协作（通常是HTTP/JSON）
3. 每个服务围绕业务能力进行构建，并且能够通过自动化机制独立地部署
4. 很少有集中式的服务管理，每个服务可以使用不同的语言开发，使用不同的存储技术，

## 解释
模块化的目的是为了重用，模块化后可以方便重复使用和插拨到不同的平台，不同的业务逻辑过程中。
组件化的目的是为了解耦，把系统拆分成多个组件，分离组件边界和责任，便于独立升级和维护。

## 参考资料
#### API网关
* [Pattern: API Gateway / Backend for Front-End](http://microservices.io/patterns/apigateway.html)
* [谈API网关的背景、架构以及落地方案](http://www.infoq.com/cn/news/2016/07/API-background-architecture-floo)

#### 微服务
* [微服务](http://microservices.io/index.html)