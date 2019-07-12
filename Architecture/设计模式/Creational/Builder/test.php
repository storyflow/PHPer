<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-01-22
 * Time: 下午 16:34
 */

include dirname(__FILE__). '/../../autoload.php';

use Creational\Builder\ConcreteBuilder;
use Creational\Builder\Director;

$builder = new ConcreteBuilder();
$director = new Director($builder);

$director->construct();
$product = $builder->getResult();