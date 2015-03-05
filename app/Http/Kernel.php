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

    /**
     * Send the given request through the middleware / router. This overloads the parent's
     * method and checks to see if middleware is enabled or not for the request. It is
     * possible for certain environments (such as testing) that middleware should not be
     * loaded.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendRequestThroughRouter($request)
    {
        $this->app->instance('request', $request);

        $this->bootstrap();

        $pipeline = (new Pipeline($this->app))->send($request);

        // Define a new environment variable that you can call here
        // true = middleware enabled, false = don't run requests through middleware
        if (env('ENABLE_MIDDLEWARE')) {
            $pipeline->through($this->middleware);
        }

        return $pipeline->then($this->dispatchToRouter());
    }

}
