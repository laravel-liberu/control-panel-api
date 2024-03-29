<?php

namespace LaravelLiberu\ControlPanelApi\Services\Groups;

use LaravelLiberu\ControlPanelApi\Services\Sensors\Horizon;
use LaravelLiberu\ControlPanelApi\Services\Sensors\Scheduler;
use LaravelLiberu\ControlPanelApi\Services\Sensors\Web;
use LaravelLiberu\ControlPanelCommon\Contracts\Group;
use LaravelLiberu\ControlPanelCommon\Services\IdProvider;

class Services extends IdProvider implements Group
{
    public function label(): string
    {
        return 'Services';
    }

    public function sliberurs(): array
    {
        return [
            Web::class, Scheduler::class, Horizon::class,
        ];
    }

    public function order(): int
    {
        return 100;
    }
}
