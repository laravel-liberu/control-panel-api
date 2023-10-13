<?php

namespace LaravelLiberu\ControlPanelApi\Services\Sensors;

class PhpVersion extends Sliberur
{
    public function value(): mixed
    {
        return PHP_VERSION;
    }

    public function tooltip(): string
    {
        return 'php version';
    }

    public function icon(): array
    {
        return ['fab', 'php'];
    }

    public function order(): int
    {
        return 200;
    }
}
