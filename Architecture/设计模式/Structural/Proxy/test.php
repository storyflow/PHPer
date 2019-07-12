<?php
/**
 * 为昂贵或者无法复制的资源提供接口。
 */

include dirname(__FILE__).'/../../autoload.php';

use Structural\Proxy\ProxyCar;
use Structural\Proxy\Car;

$car = new ProxyCar(new Car(), 15);
$car->DriveCar();

$car= new ProxyCar(new Car(), 25);
$car->DriveCar();