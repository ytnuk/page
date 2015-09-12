<?php
namespace Ytnuk\Page;

use Nette;
use Ytnuk;

class Presenter
	extends Ytnuk\Web\Presenter
{

	/**
	 * @var Entity
	 */
	private $page;

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
		if ( ! $this->page = $this->repository->getById($id)) {
			$this->error();
		}
	}

	public function actionEdit(int $id)
	{
		if ( ! $this->page = $this->repository->getById($id)) {
			$this->error();
		}
	}

	public function renderEdit()
	{
		$this[Ytnuk\Web\Control::class][Ytnuk\Menu\Control::class][] = 'page.presenter.action.edit';
	}

	public function redrawControl(
		string $snippet = NULL,
		bool $redraw = TRUE
	) {
		parent::redrawControl(
			$snippet,
			$redraw
		);
		if ($this->page) {
			$this[Control::class]->redrawControl();
		}
	}

	protected function createComponentYtnukPageControl() : Control
	{
		return $this->control->create($this->page ? : new Entity);
	}
}
