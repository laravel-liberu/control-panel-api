<?php

namespace LaravelEnso\ControlPanelApi\App\Services\Statistics;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Laravel\Horizon\Contracts\MasterSupervisorRepository;

class Horizon extends BaseSensor
{
    public function value()
    {
        return 'Horizon';
    }

    public function tooltip(): string
    {
        return 'horizon status';
    }

    public function description(): ?string
    {
        return 'it can be running or paused or inactive!';
    }

    public function icon()
    {
        switch ($this->status()) {
            case 'running':
                return ['fad', 'check-circle'];
            case 'paused':
                return ['fad', 'pause-circle'];
            default:
                return ['fad', 'times-circle'];
        }
    }

    public function class(): string
    {
        switch ($this->status()) {
            case 'running':
                return 'has-text-success';
            case 'paused':
                return 'has-text-warning';
            default:
                return 'has-text-danger';
        }
    }

    public function order(): int
    {
        return 300;
    }

    private function status()
    {
        $masters = App::make(MasterSupervisorRepository::class)->all();

        if (! $masters) {
            return 'inactive';
        }

        return (new Collection($masters))->contains(function ($master) {
            return $master->status === 'paused';
        }) ? 'paused' : 'running';
    }
}
