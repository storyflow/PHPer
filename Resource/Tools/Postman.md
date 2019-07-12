# 目录 

* [文档](#文档)
* [常见问题](#常见问题)

## 目的
1. HTTP调试 和 自动化测试

## 文档

* [官网](https://www.getpostman.com/)
* [官方文档](https://www.getpostman.com/docs/)
* [Postman使用手册4——API test](https://www.jianshu.com/p/61cfcb436ee4)
* [基于Postman的API自动化测试](https://segmentfault.com/a/1190000005055899)
* [Newman的安装及使用](http://blog.csdn.net/zhangying_csu/article/details/52386837)
* [postman中 form-data、x-www-form-urlencoded、raw、binary的区别](http://blog.csdn.net/wangjun5159/article/details/47781443)
* [Postman Collection 与 Runner](http://blog.text.wiki/2017/04/23/postman-collection-and-runner.html)
* [http://blog.csdn.net/wanglin_lin/article/details/51959342](https://juejin.im/entry/578ecaa879bc44005fff39af)

## 常见问题

1. 沙箱中如何使用jquery? 如 $.each？
说明：jQuery已经不被推荐,取而代之的是cheerio。
使用方法：`$.each => _.forEach`
[官方说明](http://blog.getpostman.com/2016/08/30/jquery-replaced-by-cheeriojs-in-postman-sandbox/)
[文档](https://lodash.com/docs/4.17.5)

2. postman 设置格式，每次都要手动转换成json？
说明：postman 返回格式是auto,会自动识别，但是效果不好，会把json当初字符串来解析。
解决办法：在设置更改格式为json

3. postman可以用来做啥？
不仅仅可以用来测试接口，还可以做接口自动化测试，生成api文档。

4. runner里执行的时候，一定要注意request的是要保存里的，不然更改了是无效的。send本身是直接起效

5. 如何传递数据？
键名设置为key[]
array[] => 1
array[] => 2

6. 返回的数据有问题，怎么处理？
```
try {
    data = JSON.parse(responseBody);
} catch (err) {
    tests["返回错误格式"] = true;
}
```