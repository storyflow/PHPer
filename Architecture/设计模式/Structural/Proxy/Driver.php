<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-07
 * Time: 下午 18:08
 */

namespace Structural\Proxy;

class Driver
{
    public $age;

    public function __construct($age)
    {
        $this->age = $age;
    }
}