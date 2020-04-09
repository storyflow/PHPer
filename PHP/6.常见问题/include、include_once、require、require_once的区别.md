## require和include的区别

*require* 和 [include](http://php.net/manual/zh/function.include.php) 几乎完全一样，除了处理失败的方式不同之外。**require** 在出错时产生 **E_COMPILE_ERROR** 级别的错误。换句话说将导致脚本中止而 [include](http://php.net/manual/zh/function.include.php) 只产生警告（**E_WARNING**），脚本会继续运行。

一般更常用include

## include_once和include区别

include_once 语句在脚本执行期间包含并运行指定文件。此行为和 [include](http://php.net/manual/zh/function.include.php) 语句类似，唯一区别是如果该文件中已经被包含过，则不会再次包含

## 括号问题

include和require后面加不加括号对执行结果没有区别，但是加上括号效率较低，所以后面能不加括号就不加括号

