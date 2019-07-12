<?php

namespace Creational\AbstractFactory;

class DellMouse extends Mouse
{

    public function __construct()
    {
        echo "创建了一只戴尔鼠标" .PHP_EOL;
    }
}