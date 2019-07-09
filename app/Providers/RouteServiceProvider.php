<?php

namespace App\Providers;

use App\AathB;
use App\City;
use App\District;
use App\Tenure;
use App\Taluka;
use App\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //
        Route::bind('aath_b', function ($aath_b_uuid) {
            return AathB::whereUuid($aath_b_uuid)->first();
        });

        Route::bind('city', function ($gaav_uuid) {
            return City::whereUuid($gaav_uuid)->first();
        });

        Route::bind('district', function ($jilha_uuid) {
            return District::whereUuid($jilha_uuid)->first();
        });

        Route::bind('tenure', function ($saal_uuid) {
            return Tenure::whereUuid($saal_uuid)->first();
        });

        Route::bind('taluka', function ($taluka_uuid) {
            return Taluka::whereUuid($taluka_uuid)->first();
        });

        Route::bind('talathi', function ($user_uuid) {
            return User::whereUuid($user_uuid)->first();
        });

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
}
