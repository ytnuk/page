<?php
namespace Ytnuk\Page;

use Nextras;
use Ytnuk;

/**
 * @property int $id {primary}
 * @property Nextras\Orm\Relationships\OneHasOneDirected|Ytnuk\Translation\Entity $content {1:1d Ytnuk\Translation\Entity::$page, primary=true}
 * @property Nextras\Orm\Relationships\OneHasOneDirected|Ytnuk\Menu\Entity $menu {1:1d Ytnuk\Menu\Entity::$page, primary=true}
 */
final class Entity
	extends Ytnuk\Orm\Entity
{

	const PROPERTY_NAME = 'menu';
}
