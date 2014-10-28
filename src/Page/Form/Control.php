<?php

namespace WebEdit\Page\Form;

use WebEdit\Database;
use WebEdit\Form;
use WebEdit\Page;

final class Control extends Form\Control
{

	private $page;
	private $form;

	public function __construct($page, Database\Form\Factory $form)
	{
		$this->page = $page;
		$this->form = $form;
	}

	protected function createComponentForm()
	{
		return $this->form->create($this->page ?: new Page\Entity);
	}

}
