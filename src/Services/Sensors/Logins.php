<?php

namespace LaravelLiberu\ControlPanelApi\Services\Sliberurs;

use LaravelLiberu\Core\Models\Login as Model;

class Logins extends Sliberur
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
