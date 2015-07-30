<?php
namespace Ytnuk\Page\Form;

use Nette;
use Ytnuk;

/**
 * Class Container
 *
 * @package Ytnuk\Page
 */
final class Container
	extends Ytnuk\Orm\Form\Container
{

	/**
	 * @inheritdoc
	 */
	protected function attached($form)
	{
		parent::attached($form);
		unset($this['menu']['link']);
	}

	/**
	 * @inheritdoc
	 */
	public function setValues(
		$values,
		$erase = FALSE
	) {
		$link = $this['menu']->getEntity()->link;
		$link->module = 'Page';
		$container = parent::setValues(
			$values,
			$erase
		);
		if ( ! $link->parameters->get()->getBy(['key' => 'id'])) {
			$linkParameter = new Ytnuk\Link\Parameter\Entity;
			$linkParameter->key = 'id';
			$linkParameter->value = $this->getEntity()->getPersistedId() ? : $this->getRepository()->persist(
				$this->getEntity()
			)->getPersistedId()
			;
			$link->parameters->add($linkParameter);
		}

		return $container;
	}
}
