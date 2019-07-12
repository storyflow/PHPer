<?php

namespace Creational\AbstractFactory;

class HpFactory extends Factory
{
    public function __construct()
    {
        echo "这里是Hp工厂" . PHP_EOL;
    }

    public function createMouse()
    {
        return new HpMouse();
    }

    public function createBoard()
    {
        return new HpBoard();
    }

}