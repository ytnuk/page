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
        $form = $this->form->create($this->page);
        $form['page'] = new Page\Form\Container($this->page ?: new Page\Entity, $this->repository);
        return $form;
    }

}
