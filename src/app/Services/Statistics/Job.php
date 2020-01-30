<?php

namespace LaravelEnso\ControlPanelApi\App\Services\Statistics;

use Illuminate\Support\Facades\App;
use Laravel\Horizon\Contracts\JobRepository;

class Job extends BaseSensor
{
    public function value()
    {
        return App::make(JobRepository::class)->getRecent()
            ->filter(fn ($job) => $job->status === 'pending')
            ->count();
    }

    public function tooltip(): string
    {
        return 'jobs';
    }

    public function description(): ?string
    {
        return 'number of pending jobs';
    }

    public function icon()
    {
        return ['fad', 'hourglass-half'];
    }

    public function order(): int
    {
        return 100;
    }
}
