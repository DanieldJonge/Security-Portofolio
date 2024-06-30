<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CustomThrottleRequests;

class RouteServiceProvider extends ServiceProvider
{
    // ...

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        // ...

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));

        // Add this line to replace the ThrottleRequests middleware with your custom middleware
        $this->app->router->aliasMiddleware('throttle', CustomThrottleRequests::class);
    }
}
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
