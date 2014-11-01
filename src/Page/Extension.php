<?php

namespace WebEdit\Page;

use Kdyby\Translation;
use Nette\DI;
use WebEdit\Config;
use WebEdit\Orm;
use WebEdit\Page;

/**
 * Class Extension
 *
 * @package WebEdit\Page
 */
final class Extension extends DI\CompilerExtension implements Config\Provider
{

	/**
	 * @return array
	 */
	public function getConfigResources()
	{
		return [
			Orm\Extension::class => [
				'repositories' => [$this->prefix('repository') => Page\Repository::class]
			],
			Translation\DI\TranslationExtension::class => [
				'dirs' => [
					__DIR__ . '/../../locale'
				]
			],
			'services' => [
				[
					'implement' => Page\Control\Factory::class,
					'parameters' => ['page'],
					'arguments' => ['%page%']
				],
				[
					'implement' => Page\Form\Control\Factory::class,
					'parameters' => ['page'],
					'arguments' => ['%page%']
				]
			]
		];
	}
}
