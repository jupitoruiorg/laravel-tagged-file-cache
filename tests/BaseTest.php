<?php

use MicroweberPackages\Cache\TaggableFileCacheServiceProvider;

abstract class BaseTest extends Orchestra\Testbench\TestCase
{

	public function tearDown():void {
		\Mockery::close();
	}


	protected function getPackageProviders($app)
	{
		return [TaggableFileCacheServiceProvider::class];
	}

	/**
	 * Define environment setup.
	 *
	 * @param  \Illuminate\Foundation\Application  $app
	 * @return void
	 */
	protected function getEnvironmentSetUp($app)
	{
		$app['config']->set('app.key','tQbgKF5NH5zMyGh4vCNypFAzx9trCkE6');

		// Setup default database to use sqlite :memory:
		$app['config']->set('cache.default', 'tfile');
		$app['config']->set('cache.stores.tfile',
							[
								'driver' => 'tfile',
								'path'   => storage_path('framework/cache'),
								'separator' => '~#~'
							]
		);
	}

}