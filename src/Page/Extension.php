<?php

namespace WebEdit\Page;

use WebEdit\Application;
use WebEdit\Database;
use WebEdit\Module;
use WebEdit\Page;
use WebEdit\Translation;

final class Extension extends Module\Extension implements Application\Provider, Database\Provider, Translation\Provider
{

	public function getApplicationResources()
	{
		return [
			'services' => [
				[
					'class' => Page\Control\Factory::class,
					'parameters' => ['page']
				],
				[
					'class' => Page\Form\Control\Factory::class,
					'parameters' => ['page']
				]
			]
		];
	}

	public function getDatabaseResources()
	{
		return [
			'repositories' => [
				Page\Repository::class
			]
		];
	}

}
