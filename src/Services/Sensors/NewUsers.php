<?php

namespace LaravelLiberu\ControlPanelApi\Services\Sensors;

use LaravelLiberu\Users\Models\User;

class NewUsers extends Sensor
{
    public function value(): mixed
    {
        return $this->filter(User::query())->count();
    }

    public function tooltip(): string
    {
        return 'new users';
    }

    public function icon(): array
    {
        return ['fad', 'user-plus'];
    }

    public function order(): int
    {
        return 100;
    }
}
