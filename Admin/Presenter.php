<?php

namespace WebEdit\Page\Admin;

use WebEdit\Admin;
use WebEdit\Page;
use WebEdit\Menu;

final class Presenter extends Admin\Presenter {

    protected $entity;

    /**
     * @inject
     * @var Page\Repository
     */
    public $repository;

    /**
     * @inject
     * @var Page\Facade
     */
    public $facade;

    /**
     * @inject
     * @var Menu\Facade
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
