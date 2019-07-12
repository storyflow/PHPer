<?php

namespace Creational\FactoryMethod;

class DellMouseFactory implements MouseFactory
{
    public function __construct()
    {
        echo "这里是Dell工厂" . PHP_EOL;
    }

    public function createMouse()
    {
        return new DellMouse();
    }

}