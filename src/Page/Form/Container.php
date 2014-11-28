<?php

namespace Ytnuk\Page\Form;

use Ytnuk;

/**
 * Class Container
 *
 * @package Ytnuk\Page
 */
final class Container extends Ytnuk\Orm\Form\Container
{

	/**
	 * @param array $values
	 *
	 * @return Ytnuk\Orm\Entity
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
