<?php
/**
 * 组合模式
 *      把对象以树形结构组合起来，以达成“部分 —— 整体”的层次结构
 */
include dirname(__FILE__).'/../../autoload.php';

use Structural\Composite\Form;
use Structural\Composite\TextElement;
use Structural\Composite\InputElement;

$form = new Form();
$form->addElement(new TextElement('Email:'));
$form->addElement(new InputElement());

$embed = new Form();
$embed->addElement(new TextElement('Password:'));
$embed->addElement(new InputElement());
$form->addElement($embed);

$data = $form->render();
var_dump($data);die();
