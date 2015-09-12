<?php
namespace Ytnuk\Page\Form\Control;

use Ytnuk;

interface Factory
{

	public function create(Ytnuk\Page\Entity $page) : Ytnuk\Page\Form\Control;
}
