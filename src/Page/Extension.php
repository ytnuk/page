<?php

namespace Kutny\Page;

use Kdyby;
use Nette;
use Kutny;

/**
 * Class Extension
 *
 * @package Kutny\Page
 */
final class Extension extends Nette\DI\CompilerExtension implements Kutny\Config\Provider
{

	/**
	 * @return array
	 */
	public function getConfigResources()
	{
		return [
			Kutny\Orm\Extension::class => [
				'repositories' => [
					$this->prefix('repository') => Repository::class
				]
			],
			Kdyby\Translation\DI\TranslationExtension::class => [
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
