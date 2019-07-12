
### 
### 在iframe中获取父级页面的id元素 
```
# JS写法
var obj=window.parent.document.getElementById('objId')  
```
```
# JQ写法
$('#父级窗口的objId', window.parent.document).css('height':'height);  // window可省略不写  
或者  
$(window.parent.document).find("#objId").css('height':'height);   // window可省略不写  
```
### 父级窗体访问iframe中的属性
```
a、 用contentWindow方法   
document.getElementById('iframe1').onload=function(){  
         this.contentWindow.run();  
 }  
b、用iframes[]框架集数组方法  
document.getElementById('iframe1').onload=function(){  
         frames["iframe1"].run();  
}  
```

### 让iframe自适应高度
```
$('#iframeId').load(function() { //方法1  
    var iframeHeight = Math.min(iframe.contentWindow.window.document.documentElement.scrollHeight, iframe.contentWindow.window.document.body.scrollHeight);  
    var h=$(this).contents().height();  
    $(this).height(h+'px');   
});  
  
$('#iframeId').load(function() { //方法2  
    var iframeHeight=$(this).contents().height();  
    $(this).height(iframeHeight+'px');   
});  
```

### 获取iframe的高度
```
iframe.contentWindow.document.body.offsetHeight;
```