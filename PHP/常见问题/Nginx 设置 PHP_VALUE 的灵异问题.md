之前通过Apache里设置auto_prepend_file / auto_append_file 来实现记录页面执行时间，后来切换到Nginx后就没有设置这个了。

搜索一番，Nginx同样支持这种设置的。

配置如下：

```
fastcgi_param PHP_VALUE "auto_prepend_file=prepend.php";
fastcgi_param PHP_VALUE "auto_append_file=append.php";
```

配置好后，重新Nginx，查看phpinfo()的输出，发现有时候auto_prepend_file设置为空。

搜索一番后，发现Nginx不支持多条PHP_VALUE的设置。

> Quick little post on a problem I had while trying to use XHGui with my Nginx/PHP-FPM setup. I needed to be able to pass the auto_prepend_file and auto_append_file settings to PHP-FPM from Nginx. In apache you can declare multiple php_value settings. However, when I did the same in nginx, it would only reflect the second setting. Turns out you need to set all of your php_value’s in Nginx in a single string, and you separate them by new line characters.

如果有多条，需要将PHP_VALUE的设置合并到一条记录上，以" \n "进行分隔。

重新配置，如下：

```
fastcgi_param PHP_VALUE "auto_prepend_file=prepend.php \n auto_append_file=append.php";
```

参考资料

https://www.liudon.org/1201.html