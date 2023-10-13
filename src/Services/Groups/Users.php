<?php

namespace LaravelLiberu\ControlPanelApi\Services\Groups;

use LaravelLiberu\ControlPanelApi\Services\Sliberurs\NewUsers;
use LaravelLiberu\ControlPanelApi\Services\Sliberurs\UserCount;
use LaravelLiberu\ControlPanelApi\Services\Sliberurs\UserGroups;
use LaravelLiberu\ControlPanelCommon\Contracts\Group;
use LaravelLiberu\ControlPanelCommon\Services\IdProvider;

class Users extends IdProvider implements Group
{
    public function label(): string
    {
        return 'Users';
    }

    public function sliberurs(): array
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
