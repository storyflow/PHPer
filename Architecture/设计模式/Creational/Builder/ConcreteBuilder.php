<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-01-22
 * Time: 下午 16:34
 */

namespace Creational\Builder;

class ConcreteBuilder implements Builder
{
    public $partA, $partB, $partC;

    public function buildPartA() {
        echo 'partA is builded' . "\n";
    }
    public function buildPartB() {
        echo 'partB is builded' . "\n";
    }
    public function buildPartC() {
        echo 'partC is builded' . "\n";
    }
    public function getResult () {
        echo 'Return product.' . "\n";
        return 1;
    }
}
