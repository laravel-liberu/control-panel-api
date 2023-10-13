<?php

namespace LaravelLiberu\ControlPanelApi\Services\Sensors;

use Illuminate\Support\Collection;
use LaravelLiberu\Helpers\Services\Decimals;
use LaravelLiberu\Helpers\Services\DiskSize;

class Memory extends Sliberur
{
    private Collection $memory;

    public function value(): mixed
    {
        return PHP_OS === 'Linux'
            ? "{$this->usage()} %"
            : 'N/A';
    }

    public function tooltip(): string
    {
        return PHP_OS === 'Linux'
            ? "memory usage from a total of {$this->total()}"
            : 'N/A';
    }

    public function icon(): array
    {
        return ['fad', 'memory'];
    }

    public function order(): int
    {
        return 200;
    }

    private function usage(): int
    {
        $div = Decimals::div($this->memory()->last(), $this->memory()->first());

        return (int) Decimals::mul($div, 100);
    }

    private function total(): string
    {
        return DiskSize::forHumans($this->memory()->first() * 1000);
    }

    private function memory(): Collection
    {
        if (isset($this->memory)) {
            return $this->memory;
        }

        $memory = (string) trim(shell_exec('free | grep Mem'));

        $this->memory = Collection::wrap(explode(' ', $memory))
            ->filter()->values()->splice(1, 2);

        return $this->memory;
    }
}
