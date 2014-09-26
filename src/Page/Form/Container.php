<?php

namespace WebEdit\Page\Form;

use WebEdit\Database;

final class Container extends Database\Form\Container
{

    protected function attached($form)
    {
        parent::attached($form);
        $this['menu']['link']->setDefaultValue(':Page:Presenter:view');
    }

}