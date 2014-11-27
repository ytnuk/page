<?php

namespace WebEdit\Page;

use WebEdit;

/**
 * @property WebEdit\Menu\Entity $menu {1:1d WebEdit\Menu\Repository $page primary}
 * @property string $content
 */
final class Entity extends WebEdit\Orm\Entity
{

	const PROPERTY_NAME = 'menu';
}
