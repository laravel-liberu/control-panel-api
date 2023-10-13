<?php

namespace LaravelLiberu\ControlPanelApi\Services\Groups;

use LaravelLiberu\ControlPanelApi\Services\Sliberurs\Disk;
use LaravelLiberu\ControlPanelApi\Services\Sliberurs\Load;
use LaravelLiberu\ControlPanelApi\Services\Sliberurs\LogSize;
use LaravelLiberu\ControlPanelApi\Services\Sliberurs\Memory;
use LaravelLiberu\ControlPanelApi\Services\Sliberurs\RequestMonitor;
use LaravelLiberu\ControlPanelApi\Services\Sliberurs\Time;
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
