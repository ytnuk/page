<?php

namespace WebEdit\Page\Admin;

use WebEdit;
use WebEdit\Menu;
use WebEdit\Page;

final class Presenter extends WebEdit\Admin\Presenter {

    protected $entity;

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
     * @var \WebEdit\Menu\Facade
     */
    public $menuFacade;

    public function actionAdd() {
        $this['form']['menu']['menu_id']->setItems($this->menuFacade->getChildren());
    }

    public function renderAdd() {
        $this['menu']['breadcrumb'][] = $this->translator->translate('page.admin.add');
    }

    public function actionEdit($id) {
        $this->entity = $this->repository->getPage($id);
        if (!$this->entity) {
            $this->error();
        }
        $this['form']['page']->setDefaults($this->entity);
        $this['form']['menu']['menu_id']->setItems($this->menuFacade->getChildren($this->entity->menu));
        $this['form']['menu']->setDefaults($this->entity->menu);
    }

    public function renderEdit() {
        $this['menu']['breadcrumb'][] = $this->translator->translate('page.admin.edit', NULL, ['page' => $this->entity->menu->title]);
    }

    protected function createComponentForm() {
        $form = $this->formFactory->create($this->entity);
        $form['menu'] = new Menu\Form\Container;
        $form['page'] = new Page\Form\Container;
        return $form;
    }

}
