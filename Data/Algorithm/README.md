# Algorithm

排序列表
===
### 稳定的排序
* 冒泡排序（bubble sort）— O(n2)
* 插入排序（insertion sort）—O(n2)
* 鸡尾酒排序（cocktail sort）—O(n2)
* 桶排序（bucket sort）—O(n)；需要O(k)额外空间
* 计数排序（counting sort）—O(n+k)；需要O(n+k)额外空间
* 归并排序（merge sort）—O(n log n)；需要O(n)额外空间
* 原地归并排序— O(n log2 n)如果使用最佳的现在版本
* 二叉排序树排序（binary tree sort）— O(n log n)期望时间；O(n2)最坏时间；需要O(n)额外空间
* 鸽巢排序（pigeonhole sort）—O(n+k)；需要O(k)额外空间
* 基数排序（radix sort）—O(n·k)；需要O(n)额外空间
* 侏儒排序（gnome sort）— O(n2)
* 图书馆排序（library sort）— O(n log n)期望时间；O(n2)最坏时间；需要(1+ε)n额外空间
* 块排序（block sort）— O(n log n)

### 不稳定的排序
* 选择排序（selection sort）—O(n2)
* 希尔排序（shell sort）—O(n log2 n)如果使用最佳的现在版本
* Clover排序算法（Clover sort）—O(n)期望时间，O(n2)最坏情况
* 梳排序— O(n log n)
* 堆排序（heap sort）—O(n log n)
* 平滑排序（smooth sort）— O(n log n)
* 快速排序（quick sort）—O(n log n)期望时间，O(n2)最坏情况；对于大的、随机数列表一般相信是最快的已知排序
* 内省排序（introsort）—O(n log n)
* 耐心排序（patience sort）—O(n log n + k)最坏情况时间，需要额外的O(n + k)空间，也需要找到最长的递增子序列（longest increasing subsequence）

### 不实用的排序
Bogo排序— O(n × n!)，最坏的情况下期望时间为无穷。
Stupid排序—O(n3);递归版本需要O(n2)额外内存
珠排序（bead sort）— O(n) or O(√n),但需要特别的硬件
煎饼排序—O(n),但需要特别的硬件
臭皮匠排序（stooge sort）算法简单，但需要约n^2.7的时间

各种算法的时间复杂度
===
![各种算法的时间复杂度](http://upload-images.jianshu.io/upload_images/37901-0b8110b2ef3c274a.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

排序分类
====
![排序分类](http://upload-images.jianshu.io/upload_images/37901-e459a6e163f5feb2.jpeg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)


相关资料
===
1. [数据结构可视化：visualgo](http://zh.visualgo.net/zh/sorting)
2. [维基百科](https://zh.wikipedia.org/wiki/%E6%8E%92%E5%BA%8F%E7%AE%97%E6%B3%95)
