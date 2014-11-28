<?php

namespace Kutny\Page\Form;

use Kutny;

/**
 * Class Control
 *
 * @package Kutny\Page
 */
final class Control extends Kutny\Form\Control
{

	/**
	 * @var Kutny\Page\Entity
	 */
	private $page;

	/**
	 * @var Kutny\Orm\Form\Factory
	 */
	private $form;

	/**
	 * @param Kutny\Page\Entity $page
	 * @param Kutny\Orm\Form\Factory $form
	 */
	public function __construct(Kutny\Page\Entity $page, Kutny\Orm\Form\Factory $form)
	{
		$this->page = $page;
		$this->form = $form;
	}

	/**
	 * @return Kutny\Orm\Form
	 */
	protected function createComponentForm()
	{
		return $this->form->create($this->page);
	}
}
