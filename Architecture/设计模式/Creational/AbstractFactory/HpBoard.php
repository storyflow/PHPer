<?php

namespace Creational\AbstractFactory;

class HpBoard extends Board
{

    public function __construct()
    {
        echo "创建了一只Hp键盘" .PHP_EOL;
    }

}