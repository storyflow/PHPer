<?php

include dirname(__FILE__) . '/../../autoload.php';

use Creational\SimpleFactory\SimpleFactory;
$factory = new SimpleFactory();
$dog = $factory->create('dog');
$dog->eat('火腿');
$cat = $factory->create('cat');
$cat->eat();