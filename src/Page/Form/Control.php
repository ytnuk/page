<?php

namespace WebEdit\Page\Form;

use WebEdit\Form;
use WebEdit\Orm;
use WebEdit\Page;

/**
 * Class Control
 *
 * @package WebEdit\Page
 */
final class Control extends Form\Control
{

	/**
	 * @var Page\Entity
	 */
	private $page;

	/**
	 * @var Orm\Form\Factory
	 */
	private $form;

	/**
	 * @param Page\Entity $page
	 * @param Orm\Form\Factory $form
	 */
	public function __construct(Page\Entity $page, Orm\Form\Factory $form)
	{
		$this->page = $page;
		$this->form = $form;
	}

	/**
	 * @return Orm\Form
	 */
	protected function createComponentForm()
	{
		return $this->form->create($this->page);
	}
}
