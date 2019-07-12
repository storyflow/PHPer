## 常用形式
1、全文替换     :g/search/s//replace/g，原型:g/search1/s/search1/replace/g  ；或者:%s/search/replace/g
2、指定多行替换   :line1,line2s/search/replace/g
3、当前替换     :s/search/replace/g 
4、指定单行替换   :line1s/from/to/g ，衍生，:.s/from/to/g当前行；:$s/from/to/g最后一行

## 语法
替换命令完整格式:[range]s/from/to/[flags]

range | 含义
-------- | ---
不写range  |  默认为光标所在的行。
.          |  光标所在的行。
1          |  第一行。
$          |  最后一行。
33         |  第33行。
'a         |  标记a所在的行（之前要使用ma做过标记）。
.+1        |  当前光标所在行的下面一行。
$-1        | 倒数第二行。（这里说明我们可以对某一行加减某个数值来取得相对的行）。 
22,33 | 第22～33行。 
flags | 含义
-------- | ---
无      |  只对指定范围内的第一个匹配项进行替换。
g       |  对指定范围内的所有匹配项进行替换。
c       |  在替换前请求用户确认。
e       |  忽略执行过程中的错误。