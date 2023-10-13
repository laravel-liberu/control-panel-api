<?php

namespace LaravelLiberu\ControlPanelApi\Facades;

use Illuminate\Support\Facades\Facade;

class Statistics extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'statistics';
    }
}
