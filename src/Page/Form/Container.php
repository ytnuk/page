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

	public function setEntityValues(Nette\Utils\ArrayHash $values) //TODO: need to check after Link module completed
	{
		$entity = parent::setEntityValues($values);
		//		$link = new Ytnuk\Link\Entity;
		//		$link->destination = ':Page:Presenter:view';
		//		$parameter = new Ytnuk\Link\Parameter\Entity;
		//		$parameter->key = 'id';
		//		$parameter->value = $this->repository->persist($entity)->id;
		//		$link->parameters[] = $parameter;
		//		$entity->menu->link = $link;
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
}
