<?php

namespace WebEdit\Page;

use WebEdit\Entity;
use WebEdit\Page\Form;

final class Control extends Entity\Control {

    public function __construct(Form\Control\Factory $form) {
        $this->form = $form;
    }

    public function render() {
        $this->template->page = $this->entity;
        $this->template->render($this->getTemplateFiles('page'));
    }

}
