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

    protected function startup() {
        parent::startup();
        $this->menu->setActive(':Page:Admin:Presenter:view');
    }

    public function renderAdd() {
        $this->menu->breadcrumbAdd(
                $this->translator->translate('page.admin.add'), 'Presenter:add');
    }

    public function actionEdit($id) {
        $this->page = $this->pageFacade->repository->getPage($id);
        if (!$this->page) {
            $this->error();
        }
    }

    public function renderEdit() {
        $this->menu->breadcrumbAdd(
                $this->translator->translate('page.admin.edit', NULL, ['page' => $this->page->node->title]), 'Presenter:edit', $this->page->id);
        $this->template->page = $this->page;
    }

    protected function createComponentPageFormAdd() {
        return $this->pageFormFactory->create();
    }

    protected function createComponentPageFormEdit() {
        return $this->pageFormFactory->create($this->page);
    }

}
