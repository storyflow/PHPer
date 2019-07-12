<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-07
 * Time: 下午 17:02
 */

namespace Structural\Facade;

class Bios implements BiosInterface
{
    public function execute()
    {
        echo "执行\n";
    }

    public function waitForKeyPress()
    {
        echo "等待\n";
    }

    public function launch($os)
    {
        echo "启动\n";
    }

    public function powerDown()
    {

    }
}
