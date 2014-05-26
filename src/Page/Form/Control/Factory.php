<?php

namespace WebEdit\Page\Form\Control;

use WebEdit\Page\Form;

interface Factory {

    /**
     * @return Form\Control
     */
    public function create();
}
