<?php
/**
 * 单例模式
 * 保证一个类只有一个实例，并提供一个访问实例的公共方法
 * 三私一公（私：静态实例变量、构造函数、克隆函数；公：获取实例），应用有：任务管理器、打印机等
 */

include dirname(__FILE__) . '/../../autoload.php';

use Creational\Singleton\Singleton;

$singleton = Singleton::getInstance(); // 只会初始化一次
$singleton = Singleton::getInstance();
$singleton->test();


// 不能克隆对象
// $singletonClone = clone $Singleton;