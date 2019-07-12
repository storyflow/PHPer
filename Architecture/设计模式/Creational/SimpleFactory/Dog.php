<?php

namespace Creational\SimpleFactory;

class Dog
{
    public function __construct()
    {
        echo "创建了一只狗" .PHP_EOL;
    }

    public function eat($food)
    {
        echo "吃{$food}中" .PHP_EOL;
    }
}