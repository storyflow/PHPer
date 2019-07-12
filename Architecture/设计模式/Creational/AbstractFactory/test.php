<?php

include dirname(__FILE__) . '/../../autoload.php';

$type = 'Hp'; //value by user.
if(!in_array($type, array('Hp','Dell'))) {
    die('Type Error');
}

$factoryClass = 'Creational\AbstractFactory\\' .$type.'Factory';
$factory = new $factoryClass();
$mouse = $factory->createMouse();
$board = $factory->CreateBoard();




