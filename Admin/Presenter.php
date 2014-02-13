<?php

namespace WebEdit\Page\Admin;

use WebEdit;

final class Presenter extends WebEdit\Admin\Presenter {

    private $page;

    /**
     * @inject
     * @var \WebEdit\Page\Model\Facade
     */
    public $pageFacade;

    /**
     * @inject
     * @var \WebEdit\Page\Form\Factory
     */
    public $pageFormFactory;

    public function renderAdd() {
        $title = $this->translator->translate('page.admin.add');
        $this->menu->breadcrumb->append($title);
    }

    public function actionEdit($id) {
        $this->page = $this->pageFacade->repository->getPage($id);
        if (!$this->page) {
            $this->error();
        }
    }

    public function renderEdit() {
        $title = $this->translator->translate('page.admin.edit', NULL, ['page' => $this->page->menu->title]);
        $this->menu->breadcrumb->append($title);
    }

    protected function createComponentPageFormAdd() {
        return $this->pageFormFactory->create();
    }

    protected function createComponentPageFormEdit() {
        return $this->pageFormFactory->create($this->page);
    }

}
