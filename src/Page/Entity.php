<?php

namespace Kutny\Page;

use Kutny;

/**
 * @property Kutny\Menu\Entity $menu {1:1d Kutny\Menu\Repository $page primary}
 * @property string $content
 */
final class Entity extends Kutny\Orm\Entity
{

	const PROPERTY_NAME = 'menu';
}
