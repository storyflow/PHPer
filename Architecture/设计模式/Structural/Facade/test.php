<?php
/**
 * 外部与一个子系统的通信必须通过一个统一的外观对象进行，为子系统中的一组接口提供一个一致的界面，外观模式定义了一个高层接口，这个接口使得这一子系统更加容易使用。
 */

include dirname(__FILE__).'/../../autoload.php';

use Structural\Facade\Facade;

$bios = new \Structural\Facade\Bios();
$os = new \Structural\Facade\Os();

$facade  =  new Facade($bios, $os);
$facade->turnOn();
$facade->turnOff();