## 场景
window系统，phpstorm写好shell脚本文件，通过ftp上传到测试机。  
赋过可执行权限，执行该sh文件，却提示No such file or directory

## 原因
- 脚本中含有特殊字符 CR(`^M`)
- windows与Unix换行的方式不一样，Windows里的文件在Unix/Mac下打开的话，在每行的结尾可能会多出一个`^M`符号。

## 说明
- Windows系统里面，每行结尾是“<回车><换行>”，即 \r\n；0x0d 0x0a
- Mac系统里，每行结尾是“<回车>”，即\r；0x0d
- Unix/Mac系统下的文件在 Windows里打开的话，所有文字会变成一行；  
而Windows里的文件在Unix/Mac下打开的话，在每行的结尾可能会多出一个^M符号。

## 解决方案
1. 方案一  
使用vi命令进行编辑该文件，进入后输入:set ff=unix 回车，wq保存退出即可。

2. 方案二  
更改phpstorm换行符设置    
