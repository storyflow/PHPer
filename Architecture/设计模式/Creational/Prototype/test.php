<?php
/**
 * 原型模式
 *      用于创建对象成本过高时
 */

include dirname(__FILE__) . '/../../autoload.php';

use Creational\Prototype\BarBookPrototype;
use Creational\Prototype\FooBookPrototype;

$fooPrototype = new FooBookPrototype();
$barPrototype = new BarBookPrototype();


for ($i = 0; $i < 10; $i++) {
    $book = clone $fooPrototype;
    $book->setTitle('Foo Book No ' . $i);
    echo $book->getTitle();
    echo "\n";
}

for ($i = 0; $i < 5; $i++) {
    $book = clone $barPrototype;
    $book->setTitle('Bar Book No ' . $i);
    echo $book->getTitle();
    echo "\n";
}