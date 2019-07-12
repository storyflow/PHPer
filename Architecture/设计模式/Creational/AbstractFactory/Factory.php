<?php

namespace Creational\AbstractFactory;

abstract class Factory
{
    abstract public function createMouse();
    abstract public function createBoard();
}