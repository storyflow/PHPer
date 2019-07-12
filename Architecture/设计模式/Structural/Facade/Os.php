<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-07
 * Time: 下午 17:04
 */

namespace Structural\Facade;

class Os implements OsInterface
{
    public function halt()
    {
        echo "停止\n";
    }

    public function getName()
    {
        echo "获得名称\n";
    }
}