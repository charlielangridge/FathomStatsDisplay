<?php

namespace CharlieLangridge\FathomStatsDisplay;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class CardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            Nova::script('fathom-stats-display', __DIR__.'/../dist/js/card.js');
            Nova::style('fathom-stats-display', __DIR__.'/../dist/css/card.css');
        });

        $this->publishes([
            __DIR__ . '/../config/fathom-stats-display.php' => config_path('fathom-stats-display.php'),
         ], 'config');
    }

    /**
     * Register the card's routes.
     *
     * @return void
     */
    protected function routes()
    {
//        if ($this->app->routesAreCached()) {
//            return;
//        }

        Route::middleware(['nova'])
                ->prefix('nova-vendor/fathom-stats-display')
                ->group(__DIR__.'/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
