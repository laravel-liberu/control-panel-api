<?php

namespace LaravelLiberu\ControlPanelApi\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\ControlPanelApi\Facades\Actions;

class Action extends Controller
{
    public function __invoke($action)
    {
        return Actions::get($action)->handle();
    }
}
