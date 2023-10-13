<?php

namespace LaravelLiberu\ControlPanelApi\Services\Sliberurs;

use Illuminate\Support\Facades\File;
use LaravelLiberu\Helpers\Services\DiskSize;

class LogSize extends Sliberur
{
    public function value(): mixed
    {
        return DiskSize::forHumans($this->logSize());
    }

    public function tooltip(): string
    {
        return "size of the application's log";
    }

    public function icon(): array
    {
        return ['fad', 'terminal'];
    }

    public function order(): int
    {
        return 400;
    }

    private function logSize(): string
    {
        return File::size(storage_path('logs/laravel.log'));
    }
}
