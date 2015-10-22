<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
        );

        //bind the configuration
        $this->app->bind(
            'Interfaces\ConfigurationInterface',
            'Dependencies\scify\configuration\Configuration'
        );

        //bind the report service
        $this->app->bind(
            'Interfaces\ReportsInterface',
            'Dependencies\municipality\services\ReportsService'
        );

        //bind the volunteer service
        $this->app->bind(
            'Interfaces\VolunteerInterface',
            'Dependencies\municipality\services\VolunteerService'
        );
	}
}
