<?php

namespace WebEdit\Page;

use WebEdit\Menu;
use WebEdit\Orm;

/**
 * @property Menu\Entity $menu {1:1d Menu\Repository $page primary}
 * @property string $content
 */
final class Entity extends Orm\Entity
{

}
