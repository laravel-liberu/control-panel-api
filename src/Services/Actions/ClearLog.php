<?php

namespace LaravelLiberu\ControlPanelApi\Services\Actions;

use LaravelLiberu\ControlPanelCommon\Contracts\Action;
use LaravelLiberu\ControlPanelCommon\Services\IdProvider;
use LaravelLiberu\Logs\Services\ClearLog as Service;

class ClearLog extends IdProvider implements Action
{
    public function handle(): array
    {
        return (new Service('laravel.log'))->handle();
    }

    public function label(): string
    {
        return 'Log';
    }

    public function tooltip(): string
    {
        return "this action clears the applications's log";
    }

    public function icon(): array
    {
        return ['fad', 'trash-alt'];
    }

    public function confirmation(): bool
    {
        return true;
    }

    public function order(): int
    {
        return 300;
    }
}
