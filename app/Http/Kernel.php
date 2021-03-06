<?php namespace LaravelTodo\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Pipeline\Pipeline;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
        'LaravelTodo\Http\Middleware\VerifyCsrfToken',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => 'LaravelTodo\Http\Middleware\Authenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' => 'LaravelTodo\Http\Middleware\RedirectIfAuthenticated',
	];

}
