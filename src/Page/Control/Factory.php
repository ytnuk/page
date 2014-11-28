<?php

namespace Kutny\Page\Control;

use Kutny;

/**
 * Interface Factory
 *
 * @package Kutny\Page
 */
interface Factory
{

	/**
	 * @param Kutny\Page\Entity $page
	 *
	 * @return Kutny\Page\Control
	 */
	public function create($page);
}
