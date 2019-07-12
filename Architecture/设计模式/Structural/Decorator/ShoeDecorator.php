<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-05
 * Time: 下午 17:28
 */
namespace Structural\Decorator;

abstract class ShoeDecorator implements Shoe
{
    protected $shoe;

    public function __construct(Shoe $shoe)
    {
        $this->shoe = $shoe;
    }

    public function produce()
    {
        $this->shoe->produce();
    }

    abstract function decorate();
}