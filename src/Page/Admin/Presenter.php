<?php

namespace WebEdit\Page\Admin;

use WebEdit\Admin;
use WebEdit\Page;

final class Presenter extends Admin\Presenter {

    private $repository;
    private $control;
    private $page;

    public function __construct(Page\Repository $repository, Page\Control\Factory $control) {
        $this->repository = $repository;
        $this->control = $control;
    }

    public function renderAdd() {
        $this['menu'][] = 'page.admin.add';
    }

    public function actionEdit($id) {
        $this->page = $this->repository->getPage($id);
        if (!$this->page) {
            $this->error();
        }
        $this['page']->setEntity($this->page);
    }

    public function renderEdit() {
        $this['menu'][] = 'page.admin.edit';
    }

    protected function createComponentPage() {
        return $this->control->create();
    }

}
