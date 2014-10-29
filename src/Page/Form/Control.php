<?php

namespace WebEdit\Page\Form;

use WebEdit\Database;
use WebEdit\Form;
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
	 * @var Database\Form\Factory
	 */
	private $form;

	/**
	 * @param Page\Entity $page
	 * @param Database\Form\Factory $form
	 */
	public function __construct(Page\Entity $page, Database\Form\Factory $form)
	{
		$this->page = $page;
		$this->form = $form;
	}

	/**
	 * @return Database\Form
	 */
	protected function createComponentForm()
	{
		return $this->form->create($this->page);
	}
}
