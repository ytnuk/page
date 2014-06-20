<?php

namespace WebEdit\Page;

use WebEdit\Application;
use WebEdit\Page;

final class Presenter extends Application\Front\Presenter {

    private $repository;
    private $control;
    private $page;

    public function __construct(Page\Repository $repository, Page\Control\Factory $control) {
        $this->repository = $repository;
        $this->control = $control;
    }

    public function actionView($id) {
        $this->page = $this->repository->getPage($id);
        if (!$this->page) {
            $this->error();
        }
        $this['page']->setEntity($this->page);
    }

    public function renderView() {
        $this['menu']->setEntity($this->page->menu);
    }

    protected function createComponentPage() {
        return $this->control->create();
    }

}
