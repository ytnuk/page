<?php

namespace WebEdit\Page;

use WebEdit\Entity;
use WebEdit\Page\Form;

final class Control extends Entity\Control {

    public function __construct(Form\Control\Factory $formControl) {
        $this->formControl = $formControl;
    }

    public function render($type = 'page') {
        parent::render($type);
    }

}
