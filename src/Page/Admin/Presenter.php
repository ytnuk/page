<?php

namespace WebEdit\Page\Admin;

use WebEdit\Admin;
use WebEdit\Database;
use WebEdit\Page;

/**
 * Class Presenter
 *
 * @package WebEdit\Page
 */
final class Presenter extends Admin\Presenter
{

	/**
	 * @var Page\Repository
	 */
	private $repository;
	/**
	 * @var Page\Control\Factory
	 */
	private $control;
	/**
	 * @var Page\Entity
	 */
	private $page;

	/**
	 * @param Page\Repository $repository
	 * @param Page\Control\Factory $control
	 */
	public function __construct(Page\Repository $repository, Page\Control\Factory $control)
	{
		$this->repository = $repository;
		$this->control = $control;
	}

	/**
	 * @param int $id
	 * @throws \Nette\Application\BadRequestException
	 */
	public function actionEdit($id)
	{
		$this->page = $this->repository->getById($id);
		if ( ! $this->page) {
			$this->error();
		}
	}

	public function renderEdit()
	{
		$this['menu'][] = 'page.admin.presenter.action.edit';
	}

	/**
	 * @return Page\Control
	 */
	protected function createComponentPage()
	{
		return $this->control->create($this->page ? : new Page\Entity);
	}
}
