<?php
/**
 * 工厂模式
 * 定义一个创建对象的接口，让子类去实例化
 */

include dirname(__FILE__) . '/../../autoload.php';

use Creational\FactoryMethod\DellMouseFactory;

$factory = new DellMouseFactory();
$mouse= $factory->createMouse();
$mouse->say();

