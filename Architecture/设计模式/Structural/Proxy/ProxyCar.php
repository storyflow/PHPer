<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-07
 * Time: 下午 18:05
 */

namespace Structural\Proxy;

class ProxyCar implements ICar
{
    private $realCar;
    private $age;

    public function __construct($realCar, $age)
    {
        $this->realCar = $realCar;
        $this->age = $age;
    }

    public function DriveCar()
    {
        if ($this->age < 16) {
            echo "Sorry, the driver is too young to drive.\n";
        } else {
            $this->realCar->DriveCar();
        }
    }
}