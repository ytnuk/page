<?php

namespace WebEdit\Page;

use Kdyby\Translation;
use Nette\DI;
use WebEdit\Config;
use WebEdit\Orm;

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
				'repositories' => [
					$this->prefix('repository') => Repository::class
				]
			],
			Translation\DI\TranslationExtension::class => [
				'dirs' => [
					__DIR__ . '/../../locale'
				]
			],
			'services' => [
				$this->prefix('control') => [
					'implement' => Control\Factory::class,
					'parameters' => ['page'],
					'arguments' => ['%page%']
				],
				$this->prefix('formControl') => [
					'implement' => Form\Control\Factory::class,
					'parameters' => ['page'],
					'arguments' => ['%page%']
				]
			]
		];
	}
}
