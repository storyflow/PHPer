<?php
/**
 * radixSort 基数排序
 *
 * 原理：
 *     1.将整数按位数切割成不同的数字
 *     2.然后按每个位数分别比较
 *
 * 时间复杂度： O(k*n)
 * 空间复杂度： O(n+k)，其中n是排序元素个数，k是数字位数
 *
 */

/**
 * 基数排序
 *
 * @param  array $input 需要排序的数据
 *
 * @return
 */
function radixSort(array &$input)
{
    // initialize 这种方式存在大量空间浪费
    $min = min($input);
    $max = max($input);
    $temp = array_fill($min, $max, 0);

    foreach ($input as $key => $val) {
        $temp[$val]++;
    }

    $input = array();
    foreach ($temp as $key => $val) {
        if ( $val == 1 ) {
            $input[] = $key;
        } else {
            while ($val--) {
                $input[] = $key;
            }
        }
    }
}

// example
$arr = array(7, 9, 5, 9, 760, 20, 4, 5, 1, 8, 5, 11000);
echo "<pre>";
print_r($arr);
radixSort($arr);
print_r($arr);
