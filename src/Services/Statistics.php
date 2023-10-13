<?php

namespace LaravelLiberu\ControlPanelApi\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use LaravelLiberu\ControlPanelApi\Services\Groups\Activity;
use LaravelLiberu\ControlPanelApi\Services\Groups\Jobs;
use LaravelLiberu\ControlPanelApi\Services\Groups\Server;
use LaravelLiberu\ControlPanelApi\Services\Groups\Services;
use LaravelLiberu\ControlPanelApi\Services\Groups\Users;
use LaravelLiberu\ControlPanelApi\Services\Groups\Versions;

class Statistics
{
    private array $stats = [
        Services::class,
        Server::class,
        Users::class,
        Versions::class,
        Activity::class,
        Jobs::class,
    ];

    public function register($registers)
    {
        $this->stats = [...$this->stats, ...$registers];
    }

    public function all()
    {
        return Collection::wrap($this->stats)
            ->map(fn ($stat) => App::make($stat));
    }
}
