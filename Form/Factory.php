<?php

namespace WebEdit\Page\Form;

use WebEdit\Form;
use WebEdit\Menu;
use WebEdit\Page;

final class Factory extends Form\Factory {

    private $menuFacade;
    private $pageFacade;

    public function __construct(Menu\Model\Facade $menuFacade, Page\Model\Facade $pageFacade) {
        $this->menuFacade = $menuFacade;
        $this->pageFacade = $pageFacade;
    }

    protected function addForm() {
        $this->form->addComponent($this->menuFacade->getFormContainer(), 'menu');
        $this->form->addComponent($this->pageFacade->getFormContainer(), 'page');
        parent::addForm();
    }

    protected function editForm($page) {
        $this->form->addComponent($this->menuFacade->getFormContainer($page->menu), 'menu');
        $this->form->addComponent($this->pageFacade->getFormContainer($page), 'page');
        parent::editForm($page);
        if ($page->menu->menu_id) {
            $this->deleteForm($page);
        }
    }

    protected function add($data) {
        $page = $this->pageFacade->addPage($data);
        $this->presenter->redirect('Presenter:edit', array('id' => $page->menu->link_id));
    }

    protected function edit($page, $data) {
        $this->pageFacade->editPage($page, $data);
        $this->presenter->redirect('this');
    }

    protected function delete($page) {
        $this->pageFacade->deletePage($page);
        $this->presenter->redirect('Presenter:view');
    }

}
