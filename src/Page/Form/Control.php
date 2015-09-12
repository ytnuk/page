<?php
namespace Ytnuk\Page\Form;

use Ytnuk;

final class Control
	extends Ytnuk\Orm\Form\Control
{

	public function __construct(
		Ytnuk\Page\Entity $page,
		Ytnuk\Orm\Form\Factory $form
	) {
		parent::__construct(
			$page,
			$form
		);
	}
}
