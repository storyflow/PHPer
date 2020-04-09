# PHP升级可能会导致的坑

## 网站
查看不同版本app里面的执行结果，性能测试：https://3v4l.org

## PHP7.1

#### 错误处理
1. 增加推荐的异常处理

#### list方法
list() 不再以反向的顺序来进行赋值

#### foreach 
foreach不再改变内部数组指针
```
<?php
$array = [0, 1, 2];
foreach ($array as &$val) {
    var_dump(current($array));
}
?>
PHP 5:
int(1)
int(2)
bool(false)

PHP 7:
int(0)
int(0)
int(0)
```

#### 字符串
含十六进制字符串不再被认为是数字

#### 返回参数
var_dump(func_get_arg(0)); //不需要打变量

#### $HTTP_RAW_POST_DATA 被移除 

## PHP7.1 

#### 支持为负的字符串偏移量
$string = 'bar';
echo $string[-1];die();
