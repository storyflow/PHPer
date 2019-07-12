<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-07
 * Time: 下午 16:55
 */

namespace Structural\Facade;

class Facade
{
    private $os;
    private $bios;

    public function __construct($bios, $os)
    {
        $this->bios = $bios;
        $this->os = $os;
    }

    public function turnOn()
    {
        $this->bios->execute();
        $this->bios->waitForKeyPress();
        $this->bios->launch($this->os);
    }

    public function turnOff()
    {
        $this->os->halt();
        $this->bios->powerDown();
    }
}