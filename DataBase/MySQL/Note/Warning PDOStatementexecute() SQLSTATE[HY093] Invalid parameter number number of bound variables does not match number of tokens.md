# 报错：Warning PDOStatementexecute() SQLSTATE[HY093] Invalid parameter number number of bound variables does not match number of tokens



### 原因

绑定的参数有问题，绑错或者多绑

### 示例



```php
$stmt = "INSERT INTO table VALUES (:some_value)";
$stmt->bindValue(':someValue', $someValue, PDO::PARAM_STR);
```

: 

```php
$stmt = "INSERT INTO table VALUES (:some_value)";
$stmt->bindValue(':some_value', $someValue, PDO::PARAM_STR);
```



### 参考资料

https://stackoverflow.com/questions/2713566/warning-pdostatementexecute-sqlstatehy093-invalid-parameter-number-num