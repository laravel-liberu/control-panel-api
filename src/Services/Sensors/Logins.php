<?php

namespace LaravelLiberu\ControlPanelApi\Services\Sensors;

use LaravelLiberu\Core\Models\Login as Model;

class Logins extends Sensor
{
    public function value(): mixed
    {
        return $this->filter(Model::query())->count();
    }

    public function tooltip(): string
    {
        return 'login count';
    }

    public function icon(): array
    {
        return ['fad', 'sign-in-alt'];
    }

    public function order(): int
    {
        return 100;
    }
}
