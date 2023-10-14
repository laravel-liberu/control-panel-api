<?php

namespace LaravelLiberu\ControlPanelApi\Services\Sensors;

use LaravelLiberu\Core\Services\Version as Service;
use LaravelLiberu\Helpers\Services\Obj;

class Version extends Sensor
{
    private Service $version;

    public function __construct(Obj $params)
    {
        parent::__construct($params);

        $this->version = new Service();
    }

    public function class(): ?string
    {
        return $this->version->isOutdated() ? 'has-text-danger' : '';
    }

    public function value(): mixed
    {
        return $this->version->current();
    }

    public function tooltip(): string
    {
        return 'liberu version';
    }

    public function icon(): array
    {
        return ['fab', 'liberu'];
    }

    public function order(): int
    {
        return 100;
    }
}
