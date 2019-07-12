<?php

namespace Structural\Bridge\Action;

class Buy implements ActionInterface
{
    public function action($food = '')
    {
        echo "买" . $food . PHP_EOL;
    }
}