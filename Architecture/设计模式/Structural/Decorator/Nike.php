<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-05
 * Time: 下午 17:28
 */
namespace Structural\Decorator;

class Nike implements Shoe
{
    protected $shoe;

    public function produce()
    {
        echo "生产Nike鞋子" . PHP_EOL;
    }
}