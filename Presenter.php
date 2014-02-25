<?php

namespace WebEdit\Page;

use WebEdit\Front;

final class Presenter extends Front\Presenter {

    /**
     * @inject
     * @var \WebEdit\Page\Repository
     */
    public $repository;
    private $page;

    public function actionView($id) {
        $this->page = $this->repository->getPage($id);
        if (!$this->page) {
            $this->error();
        }
    }

    public function renderView() {
        $this['menu']['breadcrumb'][] = $this->page->menu;
        $this->template->page = $this->page;
    }

}
