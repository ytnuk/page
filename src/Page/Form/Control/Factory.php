<?php

namespace Kutny\Page\Form\Control;

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
	 * @return Kutny\Page\Form\Control
	 */
	public function create($page);
}
