<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-07
 * Time: 下午 16:54
 */

namespace Structural\Facade;

interface BiosInterface
{
    public function execute();
    public function waitForKeyPress();
    public function launch($os);
    public function powerDown();
}