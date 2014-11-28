<?php

namespace Kutny\Page\Form;

use Kutny;

/**
 * Class Container
 *
 * @package Kutny\Page
 */
final class Container extends Kutny\Orm\Form\Container
{

	/**
	 * @param array $values
	 *
	 * @return Kutny\Orm\Entity
	 */
	public function setEntityValues(array $values)
	{
		$entity = parent::setEntityValues($values);
		$entity->menu->link = ':Page:Presenter:view';
		$entity->menu->linkId = $this->repository->persist($entity)
			->getId();

		return $entity;
	}

	/**
	 * @param $property
	 *
	 * @return \Nette\Forms\Controls\TextArea
	 */
	protected function addPropertyContent($property)
	{
		return $this->addTextArea($property->name, $this->formatPropertyLabel($property));
	}

	/**
	 * @param $form
	 */
	protected function attached($form)
	{
		parent::attached($form);
		unset($this['menu']['link']);
		unset($this['menu']['linkId']);
	}
}
