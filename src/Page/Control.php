<?php

namespace Ytnuk\Page;

use Ytnuk;

/**
 * Class Control
 *
 * @package Ytnuk\Page
 */
final class Control extends Ytnuk\Orm\Control
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
	 * @var Ytnuk\Orm\Grid\Control\Factory
	 */
	private $gridControl;

	/**
	 * @var Repository
	 */
	private $repository;

	/**
	 * @param Entity $page
	 * @param Form\Control\Factory $formControl
	 * @param Ytnuk\Orm\Grid\Control\Factory $gridControl
	 * @param Repository $repository
	 */
	public function __construct(Entity $page, Form\Control\Factory $formControl, Ytnuk\Orm\Grid\Control\Factory $gridControl, Repository $repository)
	{
		parent::__construct($page);
		$this->page = $page;
		$this->formControl = $formControl;
		$this->gridControl = $gridControl;
		$this->repository = $repository;
	}

	protected function startup()
	{
		$this->getTemplate()->add('page', $this->page);
	}

	/**
	 * @inheritdoc
	 */
	protected function getViews()
	{
		return [
			'view' => function () {
				return [
					$this->page
				];
			}
		] + parent::getViews();
	}

	/**
	 * @return Form\Control
	 */
	protected function createComponentYtnukOrmFormControl()
	{
		return $this->formControl->create($this->page);
	}

	/**
	 * @return Ytnuk\Orm\Grid\Control
	 */
	protected function createComponentYtnukGridControl()
	{
		return $this->gridControl->create($this->repository);
	}
}
