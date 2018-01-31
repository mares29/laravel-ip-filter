<?php

namespace Mares29\IpFilter;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class FilterIpServiceProvider extends ServiceProvider
{

	/**
	 * Bootstrap the application services.
	 *
	 * @param Router $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		$configPath = __DIR__ . '/../config/ip-filter.php';
		$this->publishes([$configPath => $this->getConfigPath()], 'config');
		$router->aliasMiddleware('filterIp', FilterIp::class);
	}



	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$configPath = __DIR__ . '/../config/ip-filter.php';
		$this->mergeConfigFrom($configPath, 'ip-filter');
	}



	/**
	 * Get the config path
	 *
	 * @return string
	 */
	protected function getConfigPath()
	{
		return config_path('ip-filter.php');
	}
}
