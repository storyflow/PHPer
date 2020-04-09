# SQL慢查优化方案

### 为搜索字段建索引



### 避免 SELECT *



###  拆分大的 DELETE 或 INSERT 语句

```
while (1) {
    //每次只做1000条
    mysql_query("DELETE FROM logs WHERE log_date <= '2009-11-01' LIMIT 1000");
    if (mysql_affected_rows() == 0) {
        // 没得可删了，退出！
        break;
    }
    // 每次都要休息一会儿
    usleep(50000);
}
```



### 查询ES

变更较少的SQL



### 参考资料

https://coolshell.cn/articles/1846.html