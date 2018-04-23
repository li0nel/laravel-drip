<?php

namespace li0nel\Drip;

use Illuminate\Support\ServiceProvider;

class DripServiceProvider extends ServiceProvider {
	protected $defer = true;

	public function boot() {

		$this->publishes([
			__DIR__.'/../config/drip.php' => config_path('drip.php'),
		], 'drip');
	}

	public function register() {
		$this->mergeConfigFrom( __DIR__.'/../config/drip.php', 'drip');

		$this->app->singleton('drip', function($app) {
			$config = $app->make('config');

			$api_key = $config->get('drip.api_key');
			$account_id = $config->get('drip.account_id');

			return new DripService($api_key, $account_id);
		});
	}

	public function provides() {
		return ['drip'];
	}
}
