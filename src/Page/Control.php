<?php

namespace WebEdit\Page;

use WebEdit\Application;
use WebEdit\Page;

final class Control extends Application\Control
{

    private $page;
    private $formControl;

    public function __construct($page, Page\Form\Control\Factory $formControl)
    {
        $this->page = $page;
        $this->formControl = $formControl;
    }

    protected function startup()
    {
        $this->template->page = $this->page;
    }

    protected function createComponentForm()
    {
        return $this->formControl->create($this->page);
    }

}
