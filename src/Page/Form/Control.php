<?php

namespace Ytnuk\Page\Form;

use Ytnuk;

/**
 * Class Control
 *
 * @package Ytnuk\Page
 */
final class Control extends Ytnuk\Form\Control
{

	/**
	 * @var Ytnuk\Page\Entity
	 */
	private $page;

	/**
	 * @var Ytnuk\Orm\Form\Factory
	 */
	private $form;

	/**
	 * @param Ytnuk\Page\Entity $page
	 * @param Ytnuk\Orm\Form\Factory $form
	 */
	public function __construct(Ytnuk\Page\Entity $page, Ytnuk\Orm\Form\Factory $form)
	{
		$this->page = $page;
		$this->form = $form;
	}

	/**
	 * @return Ytnuk\Orm\Form
	 */
	protected function createComponentForm()
	{
		return $this->form->create($this->page);
	}
}
