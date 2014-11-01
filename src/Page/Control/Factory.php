<?php

namespace WebEdit\Page\Control;

use WebEdit\Page;

/**
 * Interface Factory
 *
 * @package WebEdit\Page
 */
interface Factory
{

	/**
	 * @param Page\Entity $page
	 *
	 * @return Page\Control
	 */
	public function create($page);
}
