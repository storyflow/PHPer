<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-01-24
 * Time: 下午 14:29
 */
namespace Structural\Composite;

class TextElement implements RenderableInterface
{
    /**
     * @var string
     */
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function render()
    {
        return $this->text;
    }
}