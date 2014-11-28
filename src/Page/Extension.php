<?php

namespace Ytnuk\Page;

use Kdyby;
use Nette;
use Ytnuk;

/**
 * Class Extension
 *
 * @package Ytnuk\Page
 */
final class Extension extends Nette\DI\CompilerExtension implements Ytnuk\Config\Provider
{

	/**
	 * @return array
	 */
	public function getConfigResources()
	{
		return [
			Ytnuk\Orm\Extension::class => [
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
