<?php

namespace WebEdit\Page\Form\Control;

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
	 * @return WebEdit\Page\Form\Control
	 */
	public function create($page);
}
