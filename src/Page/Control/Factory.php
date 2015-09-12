<?php
namespace Ytnuk\Page\Control;

use Ytnuk;

interface Factory
{

	public function create(Ytnuk\Page\Entity $page) : Ytnuk\Page\Control;
}
