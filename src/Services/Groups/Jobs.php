<?php

namespace LaravelLiberu\ControlPanelApi\Services\Groups;

use LaravelLiberu\ControlPanelApi\Services\Sensors\FailedJobs;
use LaravelLiberu\ControlPanelApi\Services\Sensors\PendingJobs;
use LaravelLiberu\ControlPanelCommon\Contracts\Group;
use LaravelLiberu\ControlPanelCommon\Services\IdProvider;

class Jobs extends IdProvider implements Group
{
    public function label(): string
    {
        return 'Jobs';
    }

    public function sensors(): array
    {
        return [
            PendingJobs::class, FailedJobs::class,
        ];
    }

    public function order(): int
    {
        return 600;
    }
}
