<?php
/**
 * heapSort 堆排序
 *
 * 父节点i的左子节点在位置 (2*i+1);
 * 父节点i的右子节点在位置 (2*i+2);
 * 子节点i的父节点在位置 floor((i-1)/2);
 *
 * 最大堆调整（Max_Heapify）：将堆的末端子节点作调整，使得子节点永远小于父节点
 * 创建最大堆（Build_Max_Heap）：将堆所有数据重新排序
 * 堆排序（HeapSort）：移除位在第一个数据的根节点，并做最大堆调整的递归运算
 *
 * 时间复杂度： O(n*log(n))
 * 空间复杂度： O(1)
 */

/**
 * 最大堆调整
 *
 * @param  array $a
 * @param  int   $i
 * @param  int   $heapSize
 *
 * @return
 */
function heapify(&$a, &$i, &$heapSize) {
    $left  = $i*2 + 1;
    $right = $i*2 + 2;

    if ($left < $heapSize && $a[$i] < $a[$left]) {
        $largest = $left;
    } else {
        $largest = $i;
    }

    if ( $right < $heapSize && $a[$largest] < $a[$right] ) {
        $largest = $right;
    }

    if ( $largest != $i ) {
        $tmp = $a[$i];
        $a[$i] = $a[$largest];
        $a[$largest] = $tmp;

        heapify($a, $largest, $heapSize);
    }
}

/**
 * 创建最大堆
 *
 * @param  array $a
 * @param  int   $heapSize
 *
 * @return
 */
function buildHeap(&$a, &$heapSize)
{
    $len = floor($heapSize / 2);
    for ($i = $len; $i > -1; $i--) {
        heapify($a, $i, $heapSize);
    }
}

/**
 * 堆排序
 *
 * @param  array $a
 *
 * @return
 */
function heapSort(&$a)
{
    $heapSize = count($a);

    if ( $heapSize <= 1 ) {
        return $a;
    }

    buildHeap($a, $heapSize);

    while ($heapSize--) {
        $tmp = $a[$heapSize];
        $a[$heapSize] = $a[0];
        $a[0] = $tmp;
        buildHeap($a, $heapSize);
    }
}

// example
$a = array(9, 4, 3, 6, 2, 0, 4);
echo "<pre>";
print_r($a);
heapSort($a);
print_r($a);