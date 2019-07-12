<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-07
 * Time: 下午 18:04
 */

namespace Structural\Proxy;

class Car implements ICar
{
    public function DriveCar()
    {
        echo "车被开走了\n";
    }
}