<?php

namespace Ytnuk\Page\Control;

use Ytnuk;

/**
 * Interface Factory
 *
 * @package Ytnuk\Page
 */
interface Factory
{

	/**
	 * @param Ytnuk\Page\Entity $page
	 *
	 * @return Ytnuk\Page\Control
	 */
	public function create($page);
}
