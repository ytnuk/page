<?php

namespace WebEdit\Page;

use WebEdit\Module;
use WebEdit\Application;
use WebEdit\Database;
use WebEdit\Translation;
use WebEdit\Page;
use WebEdit\Page\Form;

final class Extension extends Module\Extension implements Application\Provider, Database\Provider, Translation\Provider {

    public function getApplicationResources() {
        return [
            'services' => [
                Page\Facade::class,
                Page\Control\Factory::class,
                Form\Control\Factory::class
            ]
        ];
    }

    public function getDatabaseResources() {
        return [
            'repositories' => [
                Page\Repository::class
            ]
        ];
    }

}
