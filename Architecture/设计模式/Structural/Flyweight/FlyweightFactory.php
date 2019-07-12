<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-07
 * Time: 下午 17:16
 */
namespace Structural\Flyweight;

class FlyweightFactory
{
    private $pool = [];

    public function get($name)
    {
        if (!isset($this->pool[$name])) {
            $this->pool[$name] = new CharacterFlyweight($name);
        }
        return $this->pool[$name];
    }

    public function count()
    {
        return count($this->pool);
    }
}