## 问题
1. php 的 opcache 和最近的 php jit 有什么区别？
源代码(人认识)->字节码(解释器认识)->机器码(硬件认识)
来看下PHP的执行流程，假设有个a.php文件，不启用opacache的流程如下：
``a.php->经过zend编译->opcode->PHP解释器->机器码``
启用opacache的流程如下
``a.php->查找opacache缓存，如果没有则进行zend编译为opcode并缓存->opacode->PHP解释器->机器码``
启用jit的流程如下
``a.php->编译->机器码``
以后都只执行机器码，不编译，效率上高了很多

