<?php

namespace NovaCustomViews;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use NovaCustomViews\Commands\DashboardViewCommand;
use NovaCustomViews\Commands\Error403ViewCommand;
use NovaCustomViews\Commands\Error404ViewCommand;
use NovaCustomViews\Commands\ViewsCommand;

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
            ViewsCommand::class,
            DashboardViewCommand::class,
            Error403ViewCommand::class,
            Error404ViewCommand::class
        ]);
    }
}
