<?php

namespace LaravelLiberu\ControlPanelApi\Services\Sensors;

use Illuminate\Support\Facades\Cache;

class Scheduler extends Sliberur
{
    public function value(): mixed
    {
        return 'Scheduler';
    }

    public function tooltip(): string
    {
        return 'scheduler status';
    }

    public function icon(): array
    {
        return Cache::has('scheduler_monitor')
            ? ['fad', 'check-circle']
            : ['fad', 'times-circle'];
    }

    public function class(): ?string
    {
        return Cache::has('scheduler_monitor')
            ? 'has-text-success'
            : 'has-text-danger';
    }

    public function order(): int
    {
        return 200;
    }
}
