<?php

namespace Ytnuk\Page\Form\Control;

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
	 * @return Ytnuk\Page\Form\Control
	 */
	public function create($page);
}
