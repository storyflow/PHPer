<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-07
 * Time: 下午 17:18
 */

namespace Structural\Flyweight;

class CharacterFlyweight implements FlyweightInterface
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function render($font)
    {
        echo sprintf('Character %s with font %s', $this->name, $font) . "\n";
    }
}