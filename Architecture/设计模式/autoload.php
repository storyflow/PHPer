<?php

spl_autoload_register('autoload');

function autoload($class)
{
    $fileName = str_replace('\\', DIRECTORY_SEPARATOR,  dirname(__FILE__) . '\\'. $class) . '.php';
    require $fileName;
}