<?php

namespace WebEdit\Page\Form;

use WebEdit\Database;
use WebEdit\Form;

/**
 * Class Container
 *
 * @package WebEdit\Page
 */
final class Container extends Database\Form\Container
{

	/**
	 * @param array $values
	 * @return Database\Entity
	 */
	public function setEntityValues(array $values)
	{
		$entity = parent::setEntityValues($values);
		$entity->menu->link = ':Page:Front:Presenter:view';
		$entity->menu->linkId = $this->repository->persist($entity)->getId();

		return $entity;
	}

	/**
	 * @param $property
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