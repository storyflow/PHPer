```
    var f = document.getElementById("file").files[0];
    var reader = new FileReader();
    reader.onload = function (e) {
        var data = e.target.result;
        //加载图片获取图片真实宽度和高度
        var image = new Image();
        image.onload=function(){
            var width = image.width;
            var height = image.height;
            alert(width+'======'+height+"====="+f.size);
        };
        image.src= data;
   };
   reader.readAsDataURL(f);
```

## 参考链接
https://purplebamboo.github.io/2014/02/09/javascript-watch-img-width-height/