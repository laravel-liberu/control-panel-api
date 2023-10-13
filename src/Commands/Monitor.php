<?php

namespace LaravelLiberu\ControlPanelApi\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class Monitor extends Command
{
    protected $signature = 'liberu:control-panel-api:monitor';

    protected $description = 'Monitor Schedule';

    public function handle()
    {
        Cache::put('scheduler_monitor', Carbon::now(), Carbon::now()->addMinutes(5));
    }
}
