<?php
/**
 * 主要用于减少创建对象的数量，以减少内存占用和提高性能。
 * 将内部状态（不会发生变化的状态）与外部状态（可能发生变化的状态）分离，这样不会发生变化的部分可以抽取出来共享，而可能发生变化的部分由客户维护。
 * 实例化对象 26个，而不是实例化对象26*N
 */

include dirname(__FILE__).'/../../autoload.php';

use Structural\Flyweight\FlyweightFactory;

$characters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
    'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
$fonts = ['Arial', 'Times New Roman', 'Verdana', 'Helvetica'];

$factory = new FlyweightFactory();
foreach ($characters as $char) {
    foreach ($fonts as $font) {
        $flyweight = $factory->get($char);
        $rendered = $flyweight->render($font);
    }
}

