<?php

namespace Ytnuk\Page;

use Nextras;
use Ytnuk;

/**
 * Class Repository
 *
 * @package Ytnuk\Page
 */
final class Repository extends Ytnuk\Orm\Repository
{

	/**
	 * @inheritdoc
	 */
	public function remove($entity, $recursive = FALSE)
	{
		if ($menu = $entity->getValue('menu')) {
			$menu->getRepository()->removeAndFlush($menu);
		}

		return parent::remove($entity, $recursive);
	}
}
