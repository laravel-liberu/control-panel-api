<?php

namespace LaravelLiberu\ControlPanelApi\Services\Groups;

use LaravelLiberu\ControlPanelApi\Services\Sensors\NewUsers;
use LaravelLiberu\ControlPanelApi\Services\Sensors\UserCount;
use LaravelLiberu\ControlPanelApi\Services\Sensors\UserGroups;
use LaravelLiberu\ControlPanelCommon\Contracts\Group;
use LaravelLiberu\ControlPanelCommon\Services\IdProvider;

class Users extends IdProvider implements Group
{
    public function label(): string
    {
        return 'Users';
    }

    public function sensors(): array
    {
        return [
            NewUsers::class, UserCount::class, UserGroups::class,
        ];
    }

    public function order(): int
    {
        return 400;
    }
}
