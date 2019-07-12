<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-05
 * Time: 下午 17:57
 */
include dirname(__FILE__).'/../../autoload.php';

use Structural\Decorator\Nike;
use Structural\Decorator\Adidas;
use Structural\Decorator\ShoePrice;
use Structural\Decorator\ShoeSize;

$nike = new Nike();
$nike->produce();

$decoratorPrice = new ShoePrice($nike);
$decoratorPrice->setPrice(600);
$decoratorPrice->produce();

$decoratorSize = new ShoeSize($nike);
$decoratorSize->setSize(42);
$decoratorSize->produce();