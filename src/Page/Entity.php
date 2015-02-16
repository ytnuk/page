<?php

namespace Ytnuk\Page;

use Nette;
use Nextras;
use Ytnuk;

/**
 * @property Nextras\Orm\Relationships\OneHasOneDirected|Ytnuk\Menu\Entity $menu {1:1d Ytnuk\Menu\Repository $page primary}
 * @property Nette\Utils\Html|string $content
 */
final class Entity extends Ytnuk\Orm\Entity
{

	const PROPERTY_NAME = 'menu';

	/**
	 * @return Nette\Utils\Html
	 */
	protected function getterContent()
	{
		$html = new Nette\Utils\Html;
		$html->setHtml($this->getRawValue('content'));

		return $html;
	}
}
