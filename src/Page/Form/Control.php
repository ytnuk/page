<?php

namespace Ytnuk\Page\Form;

use Ytnuk;

/**
 * Class Control
 *
 * @package Ytnuk\Page
 */
final class Control extends Ytnuk\Orm\Form\Control
{

	/**
	 * @param Ytnuk\Page\Entity $page
	 * @param Ytnuk\Orm\Form\Factory $form
	 */
	public function __construct(Ytnuk\Page\Entity $page, Ytnuk\Orm\Form\Factory $form)
	{
		parent::__construct($page, $form);
	}
}
