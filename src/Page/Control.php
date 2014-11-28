<?php

namespace Kutny\Page;

use Kutny;

/**
 * Class Control
 *
 * @package Kutny\Page
 */
final class Control extends Kutny\Application\Control
{

	/**
	 * @var Entity
	 */
	private $page;

	/**
	 * @var Form\Control\Factory
	 */
	private $formControl;

	/**
	 * @var Kutny\Orm\Grid\Control\Factory
	 */
	private $gridControl;

	/**
	 * @var Repository
	 */
	private $repository;

	/**
	 * @param Entity|NULL $page
	 * @param Form\Control\Factory $formControl
	 * @param Kutny\Orm\Grid\Control\Factory $gridControl
	 * @param Repository $repository
	 */
	public function __construct(Entity $page, Form\Control\Factory $formControl, Kutny\Orm\Grid\Control\Factory $gridControl, Repository $repository)
	{
		$this->page = $page;
		$this->formControl = $formControl;
		$this->gridControl = $gridControl;
		$this->repository = $repository;
	}

	protected function startup()
	{
		$this->template->page = $this->page;
	}

	/**
	 * @return Form\Control
	 */
	protected function createComponentForm()
	{
		return $this->formControl->create($this->page);
	}

	/**
	 * @return Kutny\Orm\Grid\Control
	 */
	protected function createComponentGrid()
	{
		return $this->gridControl->create($this->repository);
	}
}
