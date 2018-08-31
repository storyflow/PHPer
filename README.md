# PHP开发知识结构

## 目录 
#### 顺序：基础 => 进阶 => 原理 => 架构 => 业务 => 软技能
* [开发工具](#开发工具)
* [环境搭建](#环境搭建)
* [编程语言](#编程语言)
* [代码质量](#代码质量)
* [PHP](#PHP)
* [安全](#安全)
* [数据库](#数据库)
* [框架](#框架)
* [计算机基础](#计算机基础)
* [编程知识储备](#编程知识储备)
* [架构](#架构)
* [运维&统计](#运维&统计)
* [微服务](#微服务)
* [应用](#应用)
* [文档规范](#文档规范)
* [开发流程](#开发流程)
* [软技能](#软技能)
* [附录](#附录)


## 开发工具
- 编辑器和IDE
    - [PhpStorm](https://www.jetbrains.com/phpstorm/) - [讨论](https://github.com/han8gui/PHPer/issues/7)
    - [VIM](http://www.vim.org/)
    - [Sublime Text](http://www.sublimetext.com/) - [使用](https://github.com/han8gui/PHPer/blob/master/Tools/Sublime.md)
    - [VS code](https://code.visualstudio.com/)
    - [Notepad++](https://notepad-plus-plus.org/)

- 服务器组件
    - [XAMPP](https://www.apachefriends.org/zh_cn/index.html)* 
    - [WampServer](http://www.wampserver.com)
    - [phpStudy](http://phpstudy.php.cn/)

- 调试工具
    - [xhprof](http://php.net/manual/zh/book.xhprof.php)
    - [xdebug](https://xdebug.org/index.php)
    - [Fiddler](https://www.telerik.com/fiddler)
    - [Chrome Dev Tools](https://developer.chrome.com/devtools)

- 版本管理
    - [Git](http://git-scm.com/)/[SVN](http://subversion.apache.org/)
    - [Github](https://github.com/)/[GitLab](https://about.gitlab.com/)
    - [Sourcetree](https://cn.atlassian.com/software/sourcetree)

- Mysql
    - [Navicat for Mysql](https://www.navicat.com.cn/)
    - [PhpMyAdmin](https://www.phpmyadmin.net/)

- Redis
    - [redisdesktop](https://redisdesktop.com/) 

## 环境搭建
- [Linux](https://zh.wikipedia.org/zh/Linux)
- [Nginx](https://nginx.org/en/)
- [Apache](http://www.apache.org/)
- [Mysql](https://dev.mysql.com/doc/)
- [PHP](http://php.net/manual/zh/install.php)

## 编程语言
- 前端：CSS/Html/JavaScript/[bootstrap](https://getbootstrap.com/)
- LNMP：Linux/Nginx/Apache/Mysql/PHP
- 前端框架：Vuejs/React/Angular
- 其他：Golang/Java

## 代码质量
- 编码风格
    - [PSR](https://www.php-fig.org/psr/)
    - [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
    - [Clean Code PHP](https://github.com/php-cpm/clean-code-php)
- 单元测试
    - [PHPUnit](https://phpunit.de/)
- 自动化测试

## PHP
- PHP基础
    - [语言参考](http://php.net/manual/zh/langref.php)
    - [安全](http://php.net/manual/zh/security.php)
    - [特点](http://php.net/manual/zh/features.php)
    - [函数参考](http://php.net/manual/zh/funcref.php)
- 自动加载
- 命名空间
- 依赖管理： [Composer](https://getcomposer.org/)/[Packagist](https://packagist.org/)
- [PHP标准库](http://php.net/manual/zh/book.spl.php)
- PHP扩展
- [PHP内核](https://github.com/reeze/tipi)


## 安全
- [CSRF](https://en.wikipedia.org/wiki/Cross-site_request_forgery)
- [XSS](https://en.wikipedia.org/wiki/Cross-site_scripting)
- [Same-origin policy](https://en.wikipedia.org/wiki/Same-origin_policy)
- [Web 应用程序安全](http://phpsecurity.readthedocs.io/en/latest/index.html)
- 密码哈希: [加盐处理](https://en.wikipedia.org/wiki/Salt_(cryptography))/[password_hash](http://php.net/manual/zh/function.password-hash.php)
- 数据过滤
- 配置文件
- 注册全局变量
- 错误报告

## 数据库
#### 基础理论
- 数据库设计的三大范式

#### 关系型数据库
- Mysql
  - SQL基本（SELECT、UPDATE、INSERT、DELETE、JOIN、子查询）
  - MySQL特性（表引擎、字段类型、函数、索引类型）
  - MySQL进阶（Explain查询优化、Profiler、索引优化、processlist管理、备份还原、主从复制）
  - MySQL命令行操作
  -使用PHP操作MySQL（PDO、Prepare、Bind）
- SQLite

#### NoSQL数据库
- Memcached
- Redis
- MongoDB

## 框架
- [Laravel](https://laravel.com/)
- [Yii](https://www.yiiframework.com/)
    - [权威指南](http://www.yiichina.com/doc/guide/2.0)
- [symfony](https://symfony.com/)
- [codeigniter](https://codeigniter.com/)
- [Phalcon](https://phalconphp.com/zh/)
- [ThinkPHP](http://www.thinkphp.cn/)
- [Swoole](https://www.swoole.com/)
- [Tars](https://github.com/Tencent/Tars)
- [Swoft](https://www.swoft.org/)

## 计算机基础
- 编译原理
- 计算机网络
- 操作系统
- 算法原理
- 计算机组成原理

## 编程知识储备
- [数据结构](http://zh.wikipedia.org/wiki/%E6%95%B0%E6%8D%AE%E7%BB%93%E6%9E%84)
    - 数组（Array）
    - 堆栈（Stack）
    - 队列（Queue）
    - 链表（Linked List）
    - 树（Tree）
    - 图（Graph）
    - 堆（Heap）
    - 散列表（Hash）
- [OOP](https://zh.wikipedia.org/zh-hans/%E9%9D%A2%E5%90%91%E5%AF%B9%E8%B1%A1%E7%A8%8B%E5%BA%8F%E8%AE%BE%E8%AE%A1)/[AOP](https://zh.wikipedia.org/wiki/%E9%9D%A2%E5%90%91%E4%BE%A7%E9%9D%A2%E7%9A%84%E7%A8%8B%E5%BA%8F%E8%AE%BE%E8%AE%A1)
- [闭包](http://www.jibbering.com/faq/notes/closures/)
- [编程范型](http://zh.wikipedia.org/wiki/%E7%BC%96%E7%A8%8B%E8%8C%83%E5%9E%8B)
- [设计模式](https://github.com/domnikl/DesignPatternsPHP)
- 网络编程&并发
    - 多线程
    - 线程安全
    - 一致性、事务
    - 锁
- 操作系统
    - 计算机原理
    - CPU
    - 多级缓存
    - 进程
    - 线程
    - 协程

## 架构
- 复杂度
- 高并发
- 高性能
- 高可用
- 中间件
    - Web Server
    - 缓存
    - 消息队列
    - 定时调度
    - RPC
    - 数据库中间件
    - 日志系统
    - 配置中心
    - API网关
- 分布式/集群

## 运维&统计
- 持续集成(CI/CD)
- 测试
    - TDD 理论
    - 单元测试
    - 压力测试
    - 全链路压测
    - A/B、灰度、蓝绿测试
- 虚拟化
- 容器技术

## 微服务
- 负载均衡
    - Nginx/LVS
- 微服务
    - 服务网关

## 应用
- 用户
    - [单点登录](https://zh.wikipedia.org/wiki/%E5%96%AE%E4%B8%80%E7%99%BB%E5%85%A5)
- 权限
    - [权限系统](https://tech.youzan.com/sam/)
- 业务
- 搜索
    - [Elasticsearch](https://www.elastic.co)
    - Sphinx
    - Solr

## 文档规范
- 文档
    - 设计交付文档
    - URL接口文档
        - [Postman](https://www.getpostman.com/)
    - [数据库文档](https://github.com/star7th/showdoc)
    - API文档
        - [swagger](https://swagger.io/)
        - [apiDoc](http://apidocjs.com/)
        - [phpDoc](https://www.phpdoc.org/)
- 规范
    - [HTTP](https://zh.wikipedia.org/zh-hans/%E8%B6%85%E6%96%87%E6%9C%AC%E4%BC%A0%E8%BE%93%E5%8D%8F%E8%AE%AE)
- 工具
    - [石墨文档](https://shimo.im/)
    - [语雀](https://yuque.com/)
    - [GitBook](https://www.gitbook.com/)
    - [KanCloud](https://www.kancloud.cn)

## 开发流程
- 编码
- 测试
- 部署
- 监控 

## 软技能
- 沟通能力
- 责任感
- 逻辑思维
    - [金字塔原理](https://book.douban.com/subject/1020644/) 
- 分析问题、解决问题
- 学习能力
    - [刻意练习](https://book.douban.com/subject/26895993/)
- 团队合作
- 执行力

## 附录
- [PHP之道](https://laravel-china.github.io/php-the-right-way/#language_highlights)
- [技术网站及博客集锦](https://github.com/han8gui/technology-website)