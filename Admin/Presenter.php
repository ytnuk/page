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
     * @var \WebEdit\Page\Facade
     */
    public $facade;

    /**
     * @inject
     * @var \WebEdit\Page\Form\Factory
     */
    public $formFactory;

    public function actionAdd() {
        $this['form']->onSuccess[] = [$this, 'handleAdd'];
    }

    public function handleAdd($form) {
        $page = $this->facade->addPage($form->getValues(TRUE));
        $this->redirect('Presenter:edit', ['id' => $page->id]);
    }

    public function renderAdd() {
        $this['menu']['breadcrumb'][] = $this->translator->translate('page.admin.add');
    }

    public function actionEdit($id) {
        $this->page = $this->repository->getPage($id);
        if (!$this->page) {
            $this->error();
        }
        $this['form']['page']->setDefaults($this->page);
        $this['form']['menu']->setDefaults($this->page->menu);
        $this['form']->onSuccess[] = [$this, 'handleEdit'];
    }

    public function handleEdit($form) {
        if ($form->submitted->name == 'delete') {
            $this->facade->deletePage($this->page);
            $this->redirect('Presenter:view');
        } else {
            $this->facade->editPage($this->page, $form->getValues(TRUE));
            $this->redirect('this');
        }
    }

    public function renderEdit() {
        $this['menu']['breadcrumb'][] = $this->translator->translate('page.admin.edit', NULL, ['page' => $this->page->menu->title]);
    }

    protected function createComponentForm() {
        return $this->formFactory->create($this->page);
    }

}
