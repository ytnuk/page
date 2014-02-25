<?php

namespace WebEdit\Page\Form;

use WebEdit\Menu;

class Factory {

    private $menuFormFactory;

    public function __construct(Menu\Form\Factory $menuFormFactory) {
        $this->menuFormFactory = $menuFormFactory;
    }

    public function create($page = NULL) {
        $menu = $page ? $page->menu : NULL;
        $form = $this->menuFormFactory->create($menu);
        $form->addGroup('page.form.group');
        $container = $form->addContainer('page');
        $container->addTextArea('content', 'page.form.content.label')->setRequired();
        return $form;
    }

}
