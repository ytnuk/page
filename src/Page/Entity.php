<?php
namespace Ytnuk\Page;

use Nextras;
use Ytnuk;

/**
 * @property int $id {primary}
 * @property Nextras\Orm\Relationships\OneHasOne|Ytnuk\Translation\Entity $content {1:1 Ytnuk\Translation\Entity::$page, primary=true, cascade=[persist, remove]}
 * @property Nextras\Orm\Relationships\OneHasOne|Ytnuk\Menu\Entity $menu {1:1 Ytnuk\Menu\Entity::$page, primary=true}
 */
final class Entity
	extends Ytnuk\Orm\Entity
{

	const PROPERTY_NAME = 'menu';
}
