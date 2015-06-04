<?php

namespace Ytnuk\Page;

use Nextras;
use Ytnuk;

/**
 * @property Nextras\Orm\Relationships\OneHasOneDirected|Ytnuk\Translation\Entity $content {1:1d Ytnuk\Translation\Repository $page primary}
 * @property Nextras\Orm\Relationships\OneHasOneDirected|Ytnuk\Menu\Entity $menu {1:1d Ytnuk\Menu\Repository $page primary}
 */
final class Entity extends Ytnuk\Orm\Entity
{

	const PROPERTY_NAME = 'menu';

}
