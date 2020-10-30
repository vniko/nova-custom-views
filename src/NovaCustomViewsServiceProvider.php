<?php

namespace devmtm\NovaCustomViews;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;

class NovaCustomViewsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-custom-views', __DIR__ . '/../dist/js/nova-custom-views.js');
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            devmtm\NovaCustomViews\Commands\ViewsCommand::class,
            devmtm\NovaCustomViews\Commands\DashboardViewCommand::class,
            devmtm\NovaCustomViews\Commands\Error403ViewCommand::class,
            devmtm\NovaCustomViews\Commands\Error404ViewCommand::class
        ]);
    }
}
