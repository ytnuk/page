<?php

namespace WebEdit\Page\Front;

use WebEdit\Front;
use WebEdit\Page;

final class Presenter extends Front\Presenter
{

	private $repository;
	private $control;
	private $page;

	public function __construct(Page\Repository $repository, Page\Control\Factory $control)
	{
		$this->repository = $repository;
		$this->control = $control;
	}

	public function actionView($id)
	{
		$this->page = $this->repository->getById($id);
		if ( ! $this->page) {
			$this->error();
		}
	}

	public function renderView()
	{
		$this['menu']->setActive($this->page->menu);
	}

	protected function createComponentPage()
	{
		return $this->control->create($this->page);
	}
}
