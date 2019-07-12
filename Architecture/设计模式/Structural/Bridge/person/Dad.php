<?php

namespace Structural\Bridge\Person;

class Dad extends Person
{
    public function action($food = '')
    {
        echo "爸爸";
        $this->action->action($food);
    }
}