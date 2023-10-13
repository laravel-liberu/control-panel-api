<?php

namespace LaravelLiberu\ControlPanelApi\Services\Groups;

use LaravelLiberu\ControlPanelApi\Services\Sensors\Database;
use LaravelLiberu\ControlPanelApi\Services\Sensors\OperatingSystem;
use LaravelLiberu\ControlPanelApi\Services\Sensors\PhpVersion;
use LaravelLiberu\ControlPanelApi\Services\Sensors\Version;
use LaravelLiberu\ControlPanelCommon\Contracts\Group;
use LaravelLiberu\ControlPanelCommon\Services\IdProvider;

class Versions extends IdProvider implements Group
{
    public function label(): string
    {
        return 'Versions';
    }

    public function sliberurs(): array
    {
        return [
            Version::class, PhpVersion::class,
            Database::class, OperatingSystem::class,
        ];
    }

    public function order(): int
    {
        return 300;
    }
}
