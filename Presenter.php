<?php

namespace WebEdit\Page;

use WebEdit\Front;

final class Presenter extends Front\Presenter {

    /**
     * @inject
     * @var \WebEdit\Page\Model\Facade
     */
    public $pageFacade;
    private $page;

    public function actionView($id) {
        $this->page = $this->pageFacade->repository->getPage($id);
        if (!$this->page) {
            $this->error();
        }
        $this->menu->breadcrumb->fromMenu($this->page->menu);
    }

    public function renderView() {
        $this->template->page = $this->page;
    }

}
