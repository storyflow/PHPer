<?php

namespace Creational\SimpleFactory;

class SimpleFactory
{
    public function create($animal)
    {
        switch ($animal) {
            case 'dog':
                return new Dog();
            case 'cat':
                return new Cat();
            default:
                echo "error: not found -> $animal" . PHP_EOL;
                break;
        }
    }
}