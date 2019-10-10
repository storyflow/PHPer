**原理**

Prometheus通过安装在远程机器上的exporter来收集监控数据

![img](assets/clipboard.png)

**1. prometheus:**

[https://www.lijiaocn.com/%E9%A1%B9%E7%9B%AE/2018/08/03/prometheus-usage.html](https://www.lijiaocn.com/项目/2018/08/03/prometheus-usage.html)



**2. Exporter**

**redis_exporter:**

地址：https://github.com/oliver006/redis_exporter

https://yq.aliyun.com/articles/251478

https://blog.52itstyle.vip/archives/1984/

使用的端口：9121



**node_exporter:**



**mysqld_exporter:**

地址： https://github.com/prometheus/mysqld_exporter

https://yunlzheng.gitbook.io/prometheus-book/part-ii-prometheus-jin-jie/exporter/commonly-eporter-usage/use-promethues-monitor-mysql

http://ylzheng.com/2018/04/02/use-prometheus-monitor-mysql/

GRANT SELECT ON performance_schema.* TO 'exporter'@'%'; (注意权限更改)



**3. 文档**

https://yunlzheng.gitbook.io/prometheus-book/



redis参数

[http://redisdoc.com/client_and_server/info.html?highlight=connected_clien](http://redisdoc.com/client_and_server/info.html?highlight=connected_clients)ts



**4. 数据统计**

默认是本地

存储到ES: https://github.com/pwillie/prometheus-es-adapter



**5. api调用**

http://172.16.0.156:9090/api/v1/query?query=rate(mysql_global_status_slow_queries[5m])&start=1558410000



**6. 遇到的问题**

**1. grafana smtp 配置问题**

报错 Failed to send alert notification email  logger=alerting.notifier.email error="unencrypted connection"



https://github.com/grafana/grafana/issues/12633

因为Go SMTP软件包不允许在没有加密的情况下进行身份验证。来自https://godoc.org/net/smtp#PlainAuth