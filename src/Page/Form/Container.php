<?php
namespace Ytnuk\Page\Form;

use Nette;
use Ytnuk;

final class Container
	extends Ytnuk\Orm\Form\Container
{

	/**
	 * @var Ytnuk\Page\Entity
	 */
	private $entity;

	/**
	 * @var Ytnuk\Page\Repository
	 */
	private $repository;

	public function __construct(
		Ytnuk\Page\Entity $entity,
		Ytnuk\Page\Repository $repository
	) {
		parent::__construct(
			$entity,
			$repository
		);
		$this->entity = $entity;
		$this->repository = $repository;
	}

	protected function attached($form)
	{
		parent::attached($form);
		unset($this['menu']['link']);
	}

	public function setValues(
		$values,
		$erase = FALSE
	) : Ytnuk\Orm\Form\Container
	{
		$container = parent::setValues(
			$values,
			$erase
		);
		$link = $this->entity->menu->link;
		$link->module = 'Page';
		if ( ! $link->parameters->get()->getBy(['key' => 'id'])) {
			$linkParameter = new Ytnuk\Link\Parameter\Entity;
			$linkParameter->key = 'id';
			$linkParameter->value = $this->entity->getPersistedId() ? : $this->repository->persist(
				$this->entity
			)->getPersistedId();
			$link->parameters->add($linkParameter);
		}

		return $container;
	}
}
