<?php

namespace LaravelLiberu\ControlPanelApi\Services\Groups;

use LaravelLiberu\ControlPanelApi\Services\Sensors\Logins;
use LaravelLiberu\ControlPanelApi\Services\Sensors\Requests;
use LaravelLiberu\ControlPanelApi\Services\Sensors\Sessions;
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
