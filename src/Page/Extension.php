<?php

namespace WebEdit\Page;

use WebEdit\Application;
use WebEdit\Database;
use WebEdit\Module;
use WebEdit\Page;
use WebEdit\Translation;

/**
 * Class Extension
 *
 * @package WebEdit\Page
 */
final class Extension extends Module\Extension implements Application\Provider, Database\Provider, Translation\Provider
{

	/**
	 * @return array
	 */
	public function getApplicationResources()
	{
		return ['services' => [['class' => Page\Control\Factory::class, 'parameters' => ['page']], ['class' => Page\Form\Control\Factory::class, 'parameters' => ['page']]]];
	}

	/**
	 * @return array
	 */
	public function getDatabaseResources()
	{
		return ['repositories' => [Page\Repository::class]];
	}
}
