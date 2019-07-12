<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-01-24
 * Time: 下午 14:21
 */

namespace Structural\Composite;

class InputElement implements RenderableInterface
{
    public function render()
    {
        return '<input type="text" />';
    }
}