# 跨域

## 定义
它允许浏览器向跨源服务器，发出XMLHttpRequest请求，从而克服了AJAX只能同源使用的限制。

产生原因：浏览器的“同源策略”

## 方案

### CORS解决跨域问题
```
header("Access-Control-Allow-Origin:http://xx.xx.com");
header("Access-Control-Allow-Headers: x-requested-with");
```

### JSONP

#### 原理
动态添加`<script>`标签来调用服务器提供的js脚本

方法：使用这种类型的话，会创建一个查询字符串参数 callback=? ，这个参数会加在请求的URL后面。  
服务器端应当在JSON数据前加上回调函数名，以便完成一个有效的JSONP请求。  

简单说：服务端根据客户端提交的callback的参数，返回一个callback(json)的数据，而客户端将会用script的方式处理返回数据，来对json数据做处理。

缺点：基于JSONP的实现原理,所以JSONP只能是“GET”请求,不能进行较为复杂的POST和其它请求

JSONP的简单实现：
```
<script type="text/javascript">
function getData(jsondata){
    alert(jsondata);
    //处理获得的json数据
}
</script>
<script src="http://192.168.0.249/test.php?callback=getData"></script>
```
```
<?php
$callback = $_GET['callback'];//得到回调函数名
$data = array('a','b','c');//要返回的数据
echo $callback.'('.json_encode($data).')';//输出
```



## 常见问题

1. 跨域读不了cookie - 走Token
  服务端post过去相应的信息 ，然后读取相应的key

2. 手机浏览器拦截非相同一级域名的图片

  解决方案：换成相同一级域名下 or 同步图片

## 插件： 
* [jQuery-JSONP](https://github.com/congmo/jquery-jsonp)

## 参考资料
* [跨域资源共享 CORS 详解](http://www.ruanyifeng.com/blog/2016/04/cors.html)
* [如何跨域获取cookie?](https://segmentfault.com/q/1010000007505885)