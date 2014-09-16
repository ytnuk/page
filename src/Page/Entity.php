<?php

namespace WebEdit\Page;

use WebEdit\Database;
use WebEdit\Menu;

/**
 * @property Menu\Entity $menu {m:1 Menu\Repository $groups}
 * @property string $content
 */
final class Entity extends Database\Entity
{

}
