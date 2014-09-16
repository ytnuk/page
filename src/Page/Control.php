<?php

namespace WebEdit\Page;

use WebEdit\Application;
use WebEdit\Page\Form;

final class Control extends Application\Control
{

    private $page;
    private $formControl;

    public function __construct(Form\Control\Factory $formControl)
    {
        $this->formControl = $formControl;
    }

    public function setPage($page)
    {
        $this->page = $page;
    }

    protected function startup()
    {
        $this->template->page = $this->page;
    }

    protected function createComponentForm()
    {
        $form = $this->formControl->create();
        if ($this->page) {
            $form->setEntity($this->page);
        }
        return $form;
    }

}
