<?php

namespace WebEdit\Page;

use WebEdit\Database;
use WebEdit\Menu;

/**
 * @property Menu\Entity $menu {1:1d Menu\Repository $page primary}
 * @property string $content
 */
final class Entity extends Database\Entity
{

}
