<?php

namespace LaravelLiberu\ControlPanelApi\Services\Sensors;

class Web extends Sliberur
{
    public function value(): mixed
    {
        return 'Web';
    }

    public function tooltip(): string
    {
        return 'application status';
    }

    public function icon(): array
    {
        return app()->isDownForMaintenance()
            ? ['fad', 'pause-circle']
            : ['fad', 'check-circle'];
    }

    public function class(): ?string
    {
        return app()->isDownForMaintenance()
            ? 'has-text-warning'
            : 'has-text-success';
    }

    public function order(): int
    {
        return 100;
    }
}
