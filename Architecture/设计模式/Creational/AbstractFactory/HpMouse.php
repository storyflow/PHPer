<?php

namespace Creational\AbstractFactory;

class HpMouse extends Mouse
{

    public function __construct()
    {
        echo "创建了一只Hp鼠标" .PHP_EOL;
    }
}