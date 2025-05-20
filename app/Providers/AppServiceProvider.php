<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            function ($app) {
                return new class($app) extends \Illuminate\Foundation\Exceptions\Handler {
                    public function render($request, \Throwable $e)
                    {
                        // Check if this is a Method Not Allowed exception and if we're in the API
                        if ($e instanceof MethodNotAllowedHttpException && 
                            ($request->is('api/*') || $request->expectsJson())) {
                            return response()->json([
                                'message' => 'Method Not Allowed'
                            ], 405);
                        }
                        
                        return parent::render($request, $e);
                    }
                };
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(base_path('routes/api.php'));

        app('router')->aliasMiddleware('json.response', \App\Http\Middleware\ForceJsonResponse::class);

        app('router')->middlewareGroup('api', [
            'json.response',
        ]);
    }
}