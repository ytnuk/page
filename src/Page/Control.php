<?php

namespace WebEdit\Page;

use WebEdit\Application;
use WebEdit\Database;
use WebEdit\Page;

final class Control extends Application\Control
{

    private $page;
    private $formControl;
    private $gridControl;
    private $repository;

    public function __construct($page, Page\Form\Control\Factory $formControl, Database\Grid\Control\Factory $gridControl, Page\Repository $repository)
    {
        $this->page = $page;
        $this->formControl = $formControl;
        $this->gridControl = $gridControl;
        $this->repository = $repository;
    }

    protected function startup()
    {
        $this->template->page = $this->page;
    }

    protected function createComponentForm()
    {
        return $this->formControl->create($this->page);
    }

    protected function createComponentGrid()
    {
        return $this->gridControl->create($this->repository);
    }

}
