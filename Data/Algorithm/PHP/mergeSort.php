<?php
/**
 * mergeSort 归并排序
 *
 * 原理：
 *     1.申请空间，使其大小为两个已经排序序列之和，该空间用来存放合并后的序列
 *     2.设定两个指针，最初位置分别为两个已经排序序列的起始位置
 *     3.比较两个指针所指向的元素，选择相对小的元素放入到合并空间，并移动指针到下一位置
 *     4.重复步骤3直到某一指针达到序列尾
 *     5.将另一序列剩下的所有元素直接复制到合并序列尾
 *
 * 时间复杂度： O(n*log(n))
 * 空间复杂度： O(n)
 *
 */

/**
 * mergeSort
 *
 * @param  array  $a
 * @param  array  $b
 *
 * @return array
 */
function mergeSort(array $a, array $b) {
    if ( empty($a) && empty($b)) {
        return array();
    }
    $aCount = $bCount = $count = 0;
    $sort = array();
    while ( $aCount < count($a) && $bCount < count($b) ) {
        if ( $a[$aCount] < $b[$bCount] ) {
            $sort[$count++] = $a[$aCount++];
        } else {
            $sort[$count++] = $b[$bCount++];
        }
    }
    while ( $aCount < count($a) ) {
        $sort[$count++] = $a[$aCount++];
    }
    while ( $bCount < count($b) ) {
        $sort[$count++] = $b[$bCount++];
    }
    return $sort;
}

// example
$a = range(rand(2,5),rand(100,500),rand(1,3));
$b = range(rand(1,3),rand(50,500),rand(2,5));
$a = array_rand($a, 5);
$b = array_rand($b, 8);
echo "<pre>";
print_r($a);
print_r($b);
print_r(mergeSort($a, $b));