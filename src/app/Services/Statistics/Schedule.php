<?php

namespace LaravelEnso\ControlPanelApi\App\Services\Statistics;

use Illuminate\Support\Facades\Cache;

class Schedule extends BaseSensor
{
    public function value()
    {
        return 'Schedule';
    }

    public function tooltip(): string
    {
        return 'schedule status';
    }

    public function icon()
    {
        return Cache::has('schedule_monitor')
            ? ['fad', 'check-circle']
            : ['fad', 'times-circle'];
    }

    public function class(): string
    {
        return Cache::has('schedule_monitor')
            ? 'has-text-success'
            : 'has-text-danger';
    }

    public function order(): int
    {
        return 200;
    }
}
