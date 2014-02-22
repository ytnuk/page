<?php

namespace WebEdit\Page;

use WebEdit;
use WebEdit\Menu;
use WebEdit\Page;

class Facade extends WebEdit\Facade {

    public $repository;
    private $menuFacade;

    public function __construct(Page\Repository $repository, Menu\Facade $menuFacade) {
        $this->repository = $repository;
        $this->menuFacade = $menuFacade;
    }

    public function getFormContainer($page = NULL) {
        return new Page\Form\Container($page);
    }

    public function addPage(array $data) {
        $data['menu']['link'] = ':Page:Presenter:view';
        $menu = $this->menuFacade->addMenu($data['menu']);
        $data['page']['menu_id'] = $menu->id;
        $page = $this->repository->insert($data['page']);
        $this->menuFacade->editMenu($menu, array('link_id' => $page->id));
        return $page;
    }

    public function editPage($page, array $data) {
        $this->menuFacade->editMenu($page->menu, $data['menu']);
        return $this->repository->update($page, $data['page']);
    }

    public function deletePage($page) {
        $this->menuFacade->deleteMenu($page->menu);
        return $this->repository->remove($page);
    }

}
