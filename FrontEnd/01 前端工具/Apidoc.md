# Apidoc

##  安装
npm install apidoc -g

## 运行
apidoc -i myapp/ -o apidoc/ -t mytemplate/
-i 输入文件的目录，即项目文件夹
-o 输出目录，即放置生成文档的位置
-t 使用的模板，会有默认的模板，当然也可以用自己定义的模板
示例： apidoc -i abc/ -o doc/    

## apidoc.json配置文件
放在你的工程项目的根目录下，是对项目的概要介绍，包括标题、简要介绍、版本等。
```
{
  "name": "文档",
  "version": "1.0.0",
  "description": "API文档",
  "title": "API文档",
  "template": {
    "withCompare": true,
    "withGenerator": true
  }
}
```
其中name、version、description都会被显示出来。

## 注释中必需的部分
```
/** 
 * @api {get} /user/:id Request User information
 * @apiName GetUser
 * @apiGroup User
 */
```
（1）注释块必须用/** */包围
（2）@api {get} /user/:id Request User information
注释块必须以@api开头，否则会忽视这个注释块
（3）@apiName必须是一个独一无二的名字
（4）@apiGroup的作用是给这个方法分组

## 继承
@apiDefine定义了一个可重用的块，然后其他块调用这个块的时候就写：
@apiUse UserNotFoundError
在生成的文档中会自动填充成UserNotFoundError块的具体内容。
Apidoc中的继承只能继承一层，层数多了会影响可读性。

## 注释规则
（1）@api——定义接口的请求方式、请求路径、标题
（2）@apiDefine——定义一个可重用的块
（3）@apiDescription——api方法的详细介绍
（4）@apiError——出错情况的描述
（5）@apiErrorExample——一个返回出错信息的示例
（6）@apiExample——使用一个接口的示例
（7）@apiGroup——对块进行分类，便于导航条分类
（8）@apiHeader——请求头
（9）@apiHeaderExample——请求头示例
（10）@apiIgnore——不被转换的块
（11）@apiName——接口的名称
（12）@apiParam——描述接口的参数
（13）@apiParamExample——接口参数的一个示例
（14）@apiPermission
（15）@apiSampleRequest——模拟请求时的url
（16）@apiSuccess——成功时的返回值
（17）@apiSuccessExample——一个成功的返回信息的示例
（18）@apiUse——调用一个已经定义好的块
（19）@apiVersion——一个块的版本信息