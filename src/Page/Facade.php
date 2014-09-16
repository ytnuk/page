<?php

namespace WebEdit\Page;

use WebEdit\Menu;
use WebEdit\Page;

final class Facade
{

    private $repository;
    private $menuFacade;

    public function __construct(Page\Repository $repository, Menu\Facade $menuFacade)
    {
        $this->repository = $repository;
        $this->menuFacade = $menuFacade;
    }
    /**
     * public function add(array $data)
     * {
     * $menu = $this->menuFacade->add($data);
     * $data['page']['menu_id'] = $menu->id;
     * $page = $this->repository->insert($data['page']);
     * $data['menu']['link'] = ':Page:Presenter:view';
     * $data['menu']['link_id'] = $page->id;
     * $this->menuFacade->edit($menu, $data);
     * return $page;
     * }
     *
     * public function edit($page, array $data)
     * {
     * $this->menuFacade->edit($page->menu, $data);
     * $this->repository->update($page, $data['page']);
     * }
     *
     * public function delete($page)
     * {
     * $this->menuFacade->delete($page->menu);
     * $this->repository->remove($page);
     * }
     **/

}
