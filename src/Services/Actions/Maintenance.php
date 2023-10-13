<?php

namespace LaravelLiberu\ControlPanelApi\Services\Actions;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use LaravelLiberu\ControlPanelCommon\Contracts\Action;
use LaravelLiberu\ControlPanelCommon\Services\IdProvider;

class Maintenance extends IdProvider implements Action
{
    public function handle(): array
    {
        $action = App::isDownForMaintenance() ? 'up' : 'down';

        Artisan::call($action);

        return App::isDownForMaintenance()
            ? ['message' => 'Application is in maintenance mode']
            : ['message' => 'Application is in production mode'];
    }

    public function label(): string
    {
        return 'App';
    }

    public function tooltip(): string
    {
        return "this action toggles the application's maintenance mode";
    }

    public function icon(): array
    {
        return ['fad', 'power-off'];
    }

    public function confirmation(): bool
    {
        return true;
    }

    public function order(): int
    {
        return 100;
    }
}
