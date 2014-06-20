<?php

namespace WebEdit\Page;

use WebEdit\Application;

final class Extension extends Application\Extension {

    public function loadConfiguration() {
        $builder = $this->getContainerBuilder();
        $builder->addDefinition($this->prefix('repository'))
                ->setClass('WebEdit\Page\Repository');
        $builder->addDefinition($this->prefix('facade'))
                ->setClass('WebEdit\Page\Facade');
        $builder->addDefinition($this->prefix('control'))
                ->setImplement('WebEdit\Page\Control\Factory');
        $builder->addDefinition($this->prefix('form.control'))
                ->setImplement('WebEdit\Page\Form\Control\Factory');
    }

}
