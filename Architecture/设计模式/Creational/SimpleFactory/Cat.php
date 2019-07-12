<?php

namespace Creational\SimpleFactory;

class Cat
{

    public function __construct()
    {
        echo "创建了一只猫" .PHP_EOL;
    }

    public function eat()
    {
        echo '吃猫粮中' .PHP_EOL;
    }
}