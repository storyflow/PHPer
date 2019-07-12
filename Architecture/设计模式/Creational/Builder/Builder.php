<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-01-22
 * Time: 下午 16:31
 */
namespace Creational\Builder;

interface Builder {
    //创建部件A比如创建汽车车轮
    function buildPartA();
    //创建部件B 比如创建汽车方向盘
    function buildPartB();
    //创建部件C 比如创建汽车发动机
    function buildPartC();

    //返回最后组装成品结果 (返回最后装配好的汽车)
    //成品的组装过程不在这里进行,而是转移到下面的Director类中进行.
    //从而实现了解耦过程和部件
    //return Product
    function getResult();
}