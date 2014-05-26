<?php

namespace WebEdit\Page\Admin;

use WebEdit\Admin;
use WebEdit\Page;

final class Presenter extends Admin\Presenter {

    /**
     * @inject
     * @var Page\Repository
     */
    public $repository;

    /**
     * @inject
     * @var Page\Control\Factory
     */
    public $control;
    private $page;

    public function renderAdd() {
        $this['menu']['breadcrumb'][] = 'page.admin.add';
    }

    public function actionEdit($id) {
        $this->page = $this->repository->getPage($id);
        if (!$this->page) {
            $this->error();
        }
        $this['page']->setEntity($this->page);
    }

    public function renderEdit() {
        $this['menu']['breadcrumb'][] = 'page.admin.edit';
    }

    protected function createComponentPage() {
        return $this->control->create();
    }

}
