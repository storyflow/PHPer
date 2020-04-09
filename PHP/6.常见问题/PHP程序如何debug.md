# PHP程序如何debug？

一、检查是否有语法错误
---

```
php -l test.php 
```

二、基本调试
---
基本调试 API：
```
var_dump($var);print_r($var);echo $var;
```
基本的配置：
```
display_errors、log_errors、error_reporting、error_log
```
备注：有时候，会关闭报错，需要手动开启。

常用代码：
```
ini_set("display_errors","On");
error_reporting(E_ALL);
```

三、利用错误收集函数

参考手册：http://php.net/manual/zh/book.errorfunc.php

- debug_backtrace — 产生一条回溯跟踪(backtrace)
- debug_print_backtrace — 打印一条回溯。
- error_clear_last — 清除最近一次错误
- error_get_last — 获取最后发生的错误
- error_log — 发送错误信息到某个地方
- error_reporting — 设置应该报告何种 PHP 错误
- restore_error_handler — 还原之前的错误处理函数
- restore_exception_handler — 恢复之前定义过的异常处理函数。
- set_error_handler — 设置用户自定义的错误处理函数
- set_exception_handler — 设置用户自定义的异常处理函数
- trigger_error — 产生一个用户级别的 error/warning/notice 信息
- user_error — trigger_error 的别名


示例代码:
```
register_shutdown_function('my_shutdown_handler');

function my_shutdown_handler()
{
    $error = error_get_last();
    if ($error) {
        try{
            //发送邮件
        } catch(Exception $e) {

        }
    }
    return false;
}
```


三、记log
---

你认为可能出错的地方
```
file_put_contents('log.text', var_export($var, 1), FILE_APPEND);
```
另外也需要配置error_log

一般是查看apache的错误日志。命令行执行的错误，并不能收集。

四、IDE 调试
--- 
在编写时就能发现一些基本的语法错误。

五、使用工具:xdebug
---
xdebug_start_trace();
/* 业务代码     */
xdebug_stop_trace();

## 六、参考资料

1. xdebug参考:
https://www.ibm.com/developerworks/cn/opensource/os-php-xdebug/index.html
2. PhpStorm之Xdebug断点调试:
http://www.jianshu.com/p/90a724ff85f1
3. PHP 调试技术手册 
http://blog.xiayf.cn/assets/uploads/files/PHP-Debug-Manual-public.pdf