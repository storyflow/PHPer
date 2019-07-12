<?php

namespace Creational\Singleton;

class Singleton
{
    private static $instance = null;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance()
    {
        if (null == self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function test()
    {
        echo "hello world";
    }
}