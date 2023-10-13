<?php

namespace LaravelLiberu\ControlPanelApi\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use LaravelLiberu\ControlPanelApi\Services\Actions\ClearLog;
use LaravelLiberu\ControlPanelApi\Services\Actions\DownloadLog;
use LaravelLiberu\ControlPanelApi\Services\Actions\Maintenance;
use LaravelLiberu\ControlPanelCommon\Contracts\Action;

class Actions
{
    private array $actions = [
        ClearLog::class,
        DownloadLog::class,
        Maintenance::class,
    ];

    public function register($registers)
    {
        $this->actions = array_merge($this->actions, $registers);
    }

    public function all()
    {
        return Collection::wrap($this->actions)
            ->map(fn ($action) => App::make($action));
    }

    public function get($id)
    {
        return $this->all()
            ->first(fn (Action $action) => $action->id() === $id);
    }
}
