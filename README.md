# Breadcrumb for Laravel 5

This package provide simple way to filter user access by IP addresses for your Laravel 5 application.

## Install

Via Composer

``` bash
$ composer require mares29/laravel-ip-filter
```

Laravel 5.5+ automaticly register service provider and set Alias thanks to auto-discovery. With lower laravel version add to **app.php** 

``` php
'providers' => [
	\Mares29\Breadcrumb\FilterIpServiceProvider::class,
]
```

## Usage

Export filter config.

``` terminal
php artisan vendor:publish --provider="Mares29\IpFilter\FilterIpServiceProvider"
```

By default the filter is active only on **production** environment, but you can specify Your own settings in config file.

``` php
	// Env - only use filter on listed environments
	'env' => ['production'],
```


Use one of **black list** or **white list** method. For example, allow acces only from ip address *127.0.0.1*.

``` php
	// White list - List of allowed IP addresses
	'allowed' => [
		'127.0.0.1'
	],

	// Black list - List of denied IP addresses
	'denied' => [],
```

Add middleware for all Your web routes.

``` php
protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->middleware('filterIp')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }
```
Or just for specific routes.

``` php
Route::get('/', function () {
    return view('welcome');
})->middleware('filterIp');
```

## Credits

- [Karel Mares](https://github.com/mares29)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

