<?php

namespace Ytnuk\Page\Form;

use Nette;
use Ytnuk;

/**
 * Class Container
 *
 * @package Ytnuk\Page
 */
final class Container extends Ytnuk\Orm\Form\Container
{

	/**
	 * @param $property
	 *
	 * @return \Nette\Forms\Controls\TextArea
	 */
	protected function addPropertyContent($property)
	{
		return $this->addTextArea($property->name, $this->formatPropertyLabel($property));
	}
}
