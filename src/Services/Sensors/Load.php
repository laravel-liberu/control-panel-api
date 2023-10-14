<?php

namespace LaravelLiberu\ControlPanelApi\Services\Sensors;

use LaravelLiberu\ControlPanelApi\Services\Helpers\Cpu;

class Load extends Sensor
{
    public function value(): mixed
    {
        $load = Cpu::load();

        return "{$load} %";
    }

    public function tooltip(): string
    {
        $cpus = Cpu::count();

        return "instant server load - {$cpus} cpu(s)";
    }

    public function icon(): array
    {
        return ['fad', 'microchip'];
    }

    public function order(): int
    {
        return 100;
    }
}
