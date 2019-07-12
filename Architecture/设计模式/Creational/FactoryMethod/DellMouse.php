<?php

namespace Creational\FactoryMethod;

class DellMouse implements Mouse
{

    public function __construct()
    {
        echo "创建了一只鼠标" .PHP_EOL;
    }

    public function say()
    {
        echo '这个是戴尔鼠标' .PHP_EOL;
    }
}