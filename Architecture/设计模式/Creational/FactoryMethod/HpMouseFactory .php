<?php

namespace Creational\FactoryMethod;

class HpMouseFactory implements MouseFactory
{
    public function __construct()
    {
        echo "这里是Hp工厂" . PHP_EOL;
    }

    public function createMouse()
    {
        return new HpMouse();
    }
}