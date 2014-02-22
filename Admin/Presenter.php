<?php

namespace WebEdit\Page\Admin;

use WebEdit;

final class Presenter extends WebEdit\Admin\Presenter {

    private $page;

    /**
     * @inject
     * @var \WebEdit\Page\Repository
     */
    public $repository;

    /**
     * @inject
     * @var \WebEdit\Page\Form\Factory
     */
    public $formFactory;

    public function renderAdd() {
        $this['menu']['breadcrumb'][] = $this->translator->translate('page.admin.add');
    }

    public function actionEdit($id) {
        $this->page = $this->repository->getPage($id);
        if (!$this->page) {
            $this->error();
        }
    }

    public function renderEdit() {
        $this['menu']['breadcrumb'][] = $this->translator->translate('page.admin.edit', NULL, ['page' => $this->page->menu->title]);
    }

    protected function createComponentPageFormAdd() {
        return $this->formFactory->create();
    }

    protected function createComponentPageFormEdit() {
        return $this->formFactory->create($this->page);
    }

}
