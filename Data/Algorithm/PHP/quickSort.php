<?php
/**
 * quickSort 快速排序
 *
 * 原理：
 *     1.从数列中挑出一个元素，称为 "基准"（pivot），
 *     2.重新排序数列，所有元素比基准值小的摆放在基准前面，
 *       所有元素比基准值大的摆在基准的后面（相同的数可以到任一边）
 *       在这个分区退出之后，该基准就处于数列的中间位置
 *       这个称为分区（partition）操作
 *     3.递归地把小于基准值元素的子数列和大于基准值元素的子数列排序
 *
 * 时间复杂度：最好 O(n*log(n))  平均 O(n*log(n))  最坏 O(n^2)
 * 空间复杂度：O(n)
 */

/**
 * quickSort
 *
 * @param  array  $numArr
 * @return array
 */
function quickSort(array $arr)
{
    if (count($arr) <= 1) {
        return $arr;
    }
    $pivot = array_pop($arr);
    $left = $right = [];
    foreach ($arr as $value) {
        if ($value >= $pivot) {
            $right[] = $value;
        } else {
            $left[] = $value;
        }
    }
    $left = quickSort($left);
    $right = quickSort($right);
    return array_merge($left, [$pivot], $right);
}

// example
$arr = array(34, 10, 111, 99, 10, 1000, 6);
echo "<pre>";
print_r($arr);
$sortArr = quickSort($arr);
print_r($sortArr);