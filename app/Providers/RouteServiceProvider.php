<?php


// Uno de los proveedores de servicios más importantes de su aplicación

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    /* inicio de session redirectTo dominio/$home */
    public const HOME = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        /* en esta funccion declaro archivo , paraque laravel lo reconosca como archivo de rutas */
        $this->routes(function () {

            /* declaracion de archivo rutas API */
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            /* declaracion de archivo WebService */
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware('web', 'auth')
                ->prefix('admin')  // este prefijo hace la  busqueda de end-point en el archivo routes/admin
                ->name('admin.')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));

            // todas las rutas definidas en este archivo tiene el Mdlware auth
            Route::middleware('web', 'auth')
                ->name('instructor.') // este prefijo se repita en todos los nombre de los end-points del archivo routes/instrucor  => a name roote
                ->prefix('instructor')  // este prefijo hace la  busqueda de end-point en el archivo routes/instructor => uri  domain/instructor/courses
                ->namespace($this->namespace)
                ->group(base_path('routes/instructor.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
