<?php

namespace WebEdit\Page\Control;

use WebEdit\Page;

interface Factory {

    /**
     * @return Page\Control
     */
    public function create();
}
