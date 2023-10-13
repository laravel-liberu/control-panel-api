<?php

namespace LaravelLiberu\ControlPanelApi;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;
use LaravelLiberu\ControlPanelApi\Commands\Monitor;
use LaravelLiberu\ControlPanelApi\Http\Middleware\RequestMonitor;
use LaravelLiberu\ControlPanelApi\Services\Actions;
use LaravelLiberu\ControlPanelApi\Services\Statistics;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        'statistics' => Statistics::class,
        'actions' => Actions::class,
    ];

    public function boot()
    {
        $this->command()
            ->publish()
            ->load();
    }

    public function register()
    {
        $this->app['router']
            ->aliasMiddleware('request-monitor', RequestMonitor::class);
    }

    private function command(): self
    {
        $this->commands(Monitor::class);

        $this->app->booted(fn () => $this->app->make(Schedule::class)
            ->command('liberu:control-panel-api:monitor')->everyFiveMinutes());

        return $this;
    }

    private function publish(): self
    {
        $this->publishes([
            __DIR__.'/../database/seeders' => database_path('seeders'),
        ], ['control-panel-api-seeder', 'liberu-seeders']);

        return $this;
    }

    private function load()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
