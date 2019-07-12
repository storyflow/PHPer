<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-05
 * Time: 下午 17:34
 */

namespace Structural\Decorator;

class ShoePrice extends ShoeDecorator
{
    private $price;

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function produce()
    {
        $this->shoe->produce();
        $this->decorate();
    }

    function decorate()
    {
        echo "贴上价格：" . $this->price . PHP_EOL;
    }
}