<?php
namespace Ytnuk\Page;

use Nette;
use Ytnuk;

class Presenter
	extends Ytnuk\Web\Application\Presenter
{

	/**
	 * @var Entity
	 */
	private $entity;

	/**
	 * @var Repository
	 */
	private $repository;

	/**
	 * @var Control\Factory
	 */
	private $control;

	public function __construct(
		Repository $repository,
		Control\Factory $control
	) {
		parent::__construct();
		$this->repository = $repository;
		$this->control = $control;
	}

	public function actionView(int $id)
	{
		if ( ! $this->entity = $this->repository->getById($id)) {
			$this->error();
		}
	}

	public function actionEdit(int $id)
	{
		if ( ! $this->entity = $this->repository->getById($id)) {
			$this->error();
		}
	}

	public function renderEdit()
	{
		$this[Ytnuk\Web\Control::NAME][Ytnuk\Menu\Control::NAME][] = 'page.presenter.action.edit';
	}

	protected function createComponentPage() : Control
	{
		return $this->control->create($this->entity ? : new Entity);
	}
}
