<?php

namespace WebEdit\Page\Form;

use WebEdit\Form;
use WebEdit\Menu;
use WebEdit\Page;

final class Control extends Form\Control
{

    private $page;
    private $facade;
    private $form;

    public function __construct($page, Page\Facade $facade, Form\Factory $form)
    {
        $this->page = $page;
        $this->facade = $facade;
        $this->form = $form;
    }

    protected function createComponentForm()
    {
        $form = $this->form->create($this->page);
        $form['menu'] = new Menu\Form\Container;
        $form['page'] = new Page\Form\Container;
        //$this->menuFacade->getChildren($this->page ? $this->page->menu : NULL);
        $form['menu']['parent']->setItems([]);
        if ($this->page) {
            $form['page']->setDefaults($this->page->toArray());
            $form['menu']->setDefaults([
                'title' => $this->page->menu->title
            ]);
        }
        $form->onAdd[] = [$this->facade, 'add'];
        $form->onEdit[] = [$this->facade, 'edit'];
        $form->onDelete[] = [$this->facade, 'delete'];
        return $form;
    }

}
