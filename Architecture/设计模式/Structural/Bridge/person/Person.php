<?php

namespace Structural\Bridge\Person;

use Structural\Bridge\Action\ActionInterface;

abstract class Person
{
    protected $action;
    protected $who;

    public function __construct(ActionInterface $action)
    {
        $this->action = $action;
    }

    abstract function action();
}