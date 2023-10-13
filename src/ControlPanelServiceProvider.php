<?php

namespace LaravelLiberu\ControlPanelApi;

use Illuminate\Support\ServiceProvider;
use LaravelLiberu\ControlPanelApi\Facades\Actions;
use LaravelLiberu\ControlPanelApi\Facades\Statistics;

abstract class ControlPanelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Statistics::register($this->stats());
        Actions::register($this->actions());
    }

    abstract protected function stats(): array;

    abstract protected function actions(): array;
}
