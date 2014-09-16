<?php

namespace WebEdit\Page\Form;

use WebEdit\Form;

final class Container extends Form\Container
{

    protected function configure()
    {
        $this->addTextArea('content', 'page.form.content.label')->setRequired();
    }

}
