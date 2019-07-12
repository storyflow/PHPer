<?php

namespace Structural\Bridge\Person;

class Mom extends Person
{
    public function action($food = '')
    {
        echo "妈妈";
        $this->action->action($food);
    }
}