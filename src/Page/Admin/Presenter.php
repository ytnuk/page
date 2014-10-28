<?php

namespace WebEdit\Page\Admin;

use WebEdit\Admin;
use WebEdit\Database;
use WebEdit\Page;

final class Presenter extends Admin\Presenter
{

    private $repository;
    private $control;
    private $page;

    public function __construct(Page\Repository $repository, Page\Control\Factory $control)
    {
        $this->repository = $repository;
        $this->control = $control;
    }

    public function actionEdit($id)
    {
        $this->page = $this->repository->getById($id);
        if (!$this->page) {
            $this->error();
        }
    }

    public function renderEdit()
    {
        $this['menu'][] = 'page.admin.presenter.action.edit';
    }

    protected function createComponentPage()
    {
        return $this->control->create($this->page);
    }

}
