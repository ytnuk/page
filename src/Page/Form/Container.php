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
	 * @inheritdoc
	 */
	public function setValues($values, $erase = FALSE)
	{
		$link = $this['menu']->getEntity()->link;
		$link->destination = ':Page:Presenter:view';
		$container = parent::setValues($values, $erase);
		if ( ! $link->parameters->get()->getBy(['key' => 'id'])) {
			$linkParameter = new Ytnuk\Link\Parameter\Entity;
			$linkParameter->key = 'id';
			$linkParameter->value = $this->entity->getPersistedId() ? : $this->repository->persist($this->entity)->getPersistedId();
			$link->parameters->add($linkParameter);
		}

		return $container;
	}

	/**
	 * @inheritdoc
	 */
	protected function attached($form)
	{
		parent::attached($form);;
		unset($this['menu']['link']);
	}
}
