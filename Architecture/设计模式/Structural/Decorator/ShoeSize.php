<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-05
 * Time: 下午 17:34
 */

namespace Structural\Decorator;

class ShoeSize extends ShoeDecorator
{
    private $size;

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function produce()
    {
        $this->shoe->produce();
        $this->decorate();
    }

    function decorate()
    {
        echo "贴上价格：" . $this->size . PHP_EOL;
    }
}