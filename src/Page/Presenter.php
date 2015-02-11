<?php

namespace Ytnuk\Page;

use Ytnuk;

/**
 * Class Presenter
 *
 * @package Ytnuk\Page
 */
class Presenter extends Ytnuk\Web\Presenter
{

	/**
	 * @var Entity
	 */
	protected $page;

	/**
	 * @var Repository
	 */
	private $repository;

	/**
	 * @var Control\Factory
	 */
	private $control;

	/**
	 * @param Repository $repository
	 * @param Control\Factory $control
	 */
	public function __construct(Repository $repository, Control\Factory $control)
	{
		$this->repository = $repository;
		$this->control = $control;
	}

	/**
	 * @param int $id
	 *
	 * @throws \Nette\Application\BadRequestException
	 */
	public function actionView($id)
	{
		$this->page = $this->repository->getById($id);
		if ( ! $this->page) {
			$this->error();
		}
	}

	public function renderView()
	{
		//TODO: use renderView in administration to preview page
		//$this[Ytnuk\Web\Control::class][Ytnuk\Menu\Control::class][] = $this->page->menu;
		$this[Ytnuk\Web\Control::class][Ytnuk\Menu\Control::class][] = 'page.presenter.action.edit';
		//TODO: move editing to actionEdit
	}

	/**
	 * @return Control
	 */
	protected function createComponentYtnukPageControl()
	{
		return $this->control->create($this->page ? : new Entity);
	}
}
