<?php

namespace LaravelLiberu\ControlPanelApi\Services\Sensors;

use LaravelLiberu\UserGroups\Models\UserGroup;

class UserGroups extends Sliberur
{
    public function value(): mixed
    {
        return UserGroup::count();
    }

    public function tooltip(): string
    {
        return 'user groups';
    }

    public function icon(): array
    {
        return ['fad', 'users'];
    }

    public function order(): int
    {
        return 300;
    }
}
