<?php

namespace LaravelLiberu\ControlPanelApi\Services\Sensors;

class OperatingSystem extends Sliberur
{
    public function value(): mixed
    {
        return PHP_OS === 'Linux'
            ? $this->version()
            : 'N/A';
    }

    public function tooltip(): string
    {
        return 'operating system';
    }

    public function icon(): array
    {
        return ['fab', 'ubuntu'];
    }

    public function order(): int
    {
        return 400;
    }

    private function version(): string
    {
        $output = shell_exec('lsb_release -a | grep Description');

        $line = explode(' ', $output);

        return trim($line[1]);
    }
}
