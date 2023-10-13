<?php

namespace LaravelLiberu\ControlPanelApi\Services\Sliberurs;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Sessions extends Sliberur
{
    public function value(): mixed
    {
        return DB::table('sessions')
            ->whereNotNull('user_id')
            ->where('last_activity', '>=', $this->limit())
            ->count();
    }

    public function tooltip(): string
    {
        return 'session count';
    }

    public function icon(): array
    {
        return ['fad', 'link'];
    }

    public function order(): int
    {
        return 300;
    }

    private function limit(): string
    {
        $lifetime = Config::get('session.lifetime');

        return Carbon::now()->subMinutes($lifetime)->timestamp;
    }
}
