<?php

namespace LaravelLiberu\ControlPanelApi\Services\Groups;

use LaravelLiberu\ControlPanelApi\Services\Sliberurs\Logins;
use LaravelLiberu\ControlPanelApi\Services\Sliberurs\Requests;
use LaravelLiberu\ControlPanelApi\Services\Sliberurs\Sessions;
use LaravelLiberu\ControlPanelCommon\Contracts\Group;
use LaravelLiberu\ControlPanelCommon\Services\IdProvider;

class Activity extends IdProvider implements Group
{
    public function label(): string
    {
        return 'Activity';
    }

    public function sliberurs(): array
    {
        return [
            Logins::class, Requests::class, Sessions::class,
        ];
    }

    public function order(): int
    {
        return 500;
    }
}
