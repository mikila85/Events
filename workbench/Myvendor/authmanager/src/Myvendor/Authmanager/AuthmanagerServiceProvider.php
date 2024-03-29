<?php namespace Myvendor\Authmanager;

use Illuminate\Support\ServiceProvider;

class AuthmanagerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */

    public function boot()
    {
        $this->package('myvendor/authmanager');

        include __DIR__.'/../../routes.php';
    }

	public function register()
	{
		//

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}