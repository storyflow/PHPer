<?php
/**
 * insertSort 插入排序
 *
 * 原理：
 *     1.从第一个元素开始，该元素可以认为已经被排序
 *     2.取出下一个元素，在已经排序的元素序列中从后向前扫描
 *     3.如果该元素（已排序）大于新元素，将该元素移到下一位置
 *     4.重复步骤3，直到找到已排序的元素小于或者等于新元素的位置
 *     5.将新元素插入到该位置后
 *     6.重复步骤2~5
 *
 * 时间复杂度：最好 O(n)  平均 O(n^2)  最坏 O(n^2)
 * 空间复杂度：O(1)
 *
 */

/**
 * insertSort
 *
 * @param  array  $a
 *
 * @return array
 */
function insertSort(array $a)
{
    foreach ($a as $key => $value) {
        $i = $key - 1;
        while ( $i >= 0 && $value < $a[$i] ) {
            $tmp     = $a[$i+1];
            $a[$i+1] = $a[$i];
            $a[$i]   = $tmp;
            $i--;
        }
    }
    return $a;
}

// example
$a = [1, 5, 3, 100, 40, 50];
echo "<pre>";
print_r($a);
$a = insertSort($a);
print_r($a);
