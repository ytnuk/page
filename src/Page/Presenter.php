<?php

namespace WebEdit\Page;

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
        if (!$this->page) {
            $this->error();
        }
        $this['page']->setPage($this->page);
    }

    public function renderView()
    {
        $this['menu']->setMenu($this->page->menu);
    }

    protected function createComponentPage()
    {
        return $this->control->create();
    }

}
