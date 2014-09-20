<?php

namespace WebEdit\Page;

use WebEdit\Menu;
use WebEdit\Page;

final class Facade
{

    private $repository;
    private $menuRepository;

    public function __construct(Page\Repository $repository, Menu\Repository $menuRepository)
    {
        $this->repository = $repository;
        $this->menuRepository = $menuRepository;
    }

    public function add($values) //TODO
    {
        $page = new Page\Entity;
        $this->repository->attach($page);
        $page->content = $values->page->content;
        $menu = new Menu\Entity;
        $this->menuRepository->attach($menu);
        $menu->title = $values->menu->title;
        $menu->link = ':Page:Presenter:view';
        $menu->linkId = $page->id;
        $menu->parent = 1; //TODO
        $page->menu = $menu;
        return $this->repository->persistAndFlush($page);
    }

    public function edit($page, array $data)
    {
        //TODO
    }

    public function delete($page)
    {
        //TODO
    }

}
