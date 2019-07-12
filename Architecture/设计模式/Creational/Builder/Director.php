<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-01-22
 * Time: 下午 16:32
 */

namespace Creational\Builder;

class Director
{

    private $builder;

    public function __construct($builder)
    {
        $this->builder = $builder;
    }

    public function construct()
    {
        $this->builder->buildPartA();
        $this->builder->buildPartB();
        $this->builder->buildPartC();
    }
}