<?php

namespace Creational\FactoryMethod;

class HpMouse implements Mouse
{
    public function __construct()
    {
        echo "创建了一只鼠标" .PHP_EOL;
    }

    public function say()
    {
        echo "这个是惠普鼠标" .PHP_EOL;
    }
}