<?php

namespace WebEdit\Page\Form;

use WebEdit\Database;
use WebEdit\Form;
use WebEdit\Page;

final class Control extends Form\Control
{

    private $page;
    private $form;
    private $repository;

    public function __construct($page, Page\Repository $repository, Form\Factory $form)
    {
        $this->page = $page;
        $this->repository = $repository;
        $this->form = $form;
    }

    protected function createComponentForm()
    {
        $form = $this->form->create();
        $form['page'] = new Page\Form\Container($this->page ?: new Page\Entity, $this->repository);
        if ($this->page) {
            $form->addSubmit('edit', 'form.button.save');
            $form->addSubmit('delete', 'form.button.delete')->setValidationScope(FALSE);
        } else {
            $form->addSubmit('add', 'form.button.add');
        }
        return $form;
    }

}
