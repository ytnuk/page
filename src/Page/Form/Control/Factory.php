<?php

namespace WebEdit\Page\Form\Control;

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
	 * @return Page\Form\Control
	 */
	public function create($page);
}
