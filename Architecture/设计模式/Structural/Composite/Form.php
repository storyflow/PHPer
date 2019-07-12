<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-01-24
 * Time: 下午 14:17
 */

namespace Structural\Composite;

class Form implements RenderableInterface
{
    private $elements;

    /**
     * @return string
     */
    public function render()
    {
        $formCode = "<form>";

        foreach ($this->elements as $element) {
            $formCode .= $element->render();
        }

        $formCode .= '</form>';

        return $formCode;
    }

    /**
     * @param RenderableInterface $element
     */
    public function addElement(RenderableInterface $element)
    {
        $this->elements[] = $element;
    }
}