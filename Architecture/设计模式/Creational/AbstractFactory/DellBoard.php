<?php

namespace Creational\AbstractFactory;

class DellBoard extends Board
{

    public function __construct()
    {
        echo "创建了一只戴尔键盘" .PHP_EOL;
    }

}