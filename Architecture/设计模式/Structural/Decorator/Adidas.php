<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-05
 * Time: 下午 17:53
 */

namespace Structural\Decorator;

class Adidas implements Shoe
{
    protected $shoe;

    public function produce()
    {
        echo "生产Adidas鞋子" . PHP_EOL;
    }
}