<?php
/**
 * bucketSort 桶排序
 *
 * 原理：
 *     1.设置一个定量的数组当作空桶子。
 *     2.寻访串行，并且把项目一个一个放到对应的桶子去。
 *     3.对每个不是空的桶子进行排序。
 *     4.从不是空的桶子里把项目再放回原来的串行中。
 *
 * 时间复杂度：最好 O(n+k)  平均 O(n+k)  最坏 O(n^2)
 * 空间复杂度：O(n*k)
 *
 */

/**
 * bucketSort
 *
 * @param  array  $a
 *
 * @return array
 */
function bucketSort(array $a)
{
    $box = $sorted = array();
    foreach ($a as $value) {
        $box[$value][] = $value;
    }
    $min = min($a);
    $max = max($a);
    for ( $i = $min; $i <= $max; $i++ ) {
        if ( isset($box[$i]) ) {
            $sorted = array_merge($sorted, $box[$i]);
        }
    }
    return $sorted;
}

// example
$a = [200, 99, 180, 33, 11, 33, 789, 301, 45, 200];
echo "<pre>";
print_r($a);
print_r(bucketSort($a));