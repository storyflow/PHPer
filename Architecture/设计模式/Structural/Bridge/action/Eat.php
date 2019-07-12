<?php

namespace Structural\Bridge\Action;

class Eat implements ActionInterface
{
    public function action($food = '')
    {
        echo "吃" . $food . PHP_EOL;
    }
}