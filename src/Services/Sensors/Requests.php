<?php

namespace LaravelLiberu\ControlPanelApi\Services\Sensors;

use LaravelLiberu\ActionLogger\Models\ActionLog as Model;

class Requests extends Sliberur
{
    public function value(): mixed
    {
        return $this->filter(Model::query())->count();
    }

    public function tooltip(): string
    {
        return 'requests count';
    }

    public function icon(): array
    {
        return ['fad', 'mouse-alt'];
    }

    public function order(): int
    {
        return 200;
    }
}
