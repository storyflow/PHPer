<?php

namespace Creational\AbstractFactory;

class DellFactory extends Factory
{
    public function __construct()
    {
        echo "这里是Dell工厂" . PHP_EOL;
    }

    public function createMouse()
    {
        return new DellMouse();
    }

    public function createBoard()
    {
        return new DellBoard();
    }

}