<?php

namespace WebEdit\Page;

use WebEdit\Front;
use WebEdit\Page;

final class Presenter extends Front\Presenter {

    /**
     * @inject
     * @var Page\Repository
     */
    public $repository;
    private $page;

    /**
     * @inject
     * @var Page\Control\Factory
     */
    public $control;

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
