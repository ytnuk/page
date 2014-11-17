<?php

namespace WebEdit\Page\Form;

use WebEdit;

/**
 * Class Control
 *
 * @package WebEdit\Page
 */
final class Control extends WebEdit\Form\Control
{

	/**
	 * @var WebEdit\Page\Entity
	 */
	private $page;

	/**
	 * @var WebEdit\Orm\Form\Factory
	 */
	private $form;

	/**
	 * @param WebEdit\Page\Entity $page
	 * @param WebEdit\Orm\Form\Factory $form
	 */
	public function __construct(WebEdit\Page\Entity $page, WebEdit\Orm\Form\Factory $form)
	{
		$this->page = $page;
		$this->form = $form;
	}

	/**
	 * @return WebEdit\Orm\Form
	 */
	protected function createComponentForm()
	{
		return $this->form->create($this->page);
	}
}
