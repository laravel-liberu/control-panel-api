<?php

namespace LaravelLiberu\ControlPanelApi\Services\Sliberurs;

use Illuminate\Support\Facades\DB;

class FailedJobs extends Sliberur
{
    public function value(): mixed
    {
        $args = [DB::table('failed_jobs')->selectRaw('id'), 'failed_at'];

        return $this->filter(...$args)->count();
    }

    public function tooltip(): string
    {
        return 'failed jobs';
    }

    public function icon(): array
    {
        return ['fad', 'exclamation-circle'];
    }

    public function order(): int
    {
        return 200;
    }
}
