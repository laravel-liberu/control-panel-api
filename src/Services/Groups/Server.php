<?php

namespace LaravelLiberu\ControlPanelApi\Services\Groups;

use LaravelLiberu\ControlPanelApi\Services\Sensors\Disk;
use LaravelLiberu\ControlPanelApi\Services\Sensors\Load;
use LaravelLiberu\ControlPanelApi\Services\Sensors\LogSize;
use LaravelLiberu\ControlPanelApi\Services\Sensors\Memory;
use LaravelLiberu\ControlPanelApi\Services\Sensors\RequestMonitor;
use LaravelLiberu\ControlPanelApi\Services\Sensors\Time;
use LaravelLiberu\ControlPanelCommon\Contracts\Group;
use LaravelLiberu\ControlPanelCommon\Services\IdProvider;

class Server extends IdProvider implements Group
{
    public function label(): string
    {
        return 'Server';
    }

    public function sliberurs(): array
    {
        return [
            Load::class, Memory::class, Disk::class,
            LogSize::class, Time::class, RequestMonitor::class,
        ];
    }

    public function order(): int
    {
        return 200;
    }
}
