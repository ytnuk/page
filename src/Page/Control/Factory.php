<?php

namespace WebEdit\Page\Control;

use WebEdit;

/**
 * Interface Factory
 *
 * @package WebEdit\Page
 */
interface Factory
{

	/**
	 * @param WebEdit\Page\Entity $page
	 *
	 * @return WebEdit\Page\Control
	 */
	public function create($page);
}
