<?php

namespace LaravelLiberu\ControlPanelApi\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\ControlPanelApi\Facades\Statistics as Stats;
use LaravelLiberu\ControlPanelCommon\Http\Resources\Group;

class Statistics extends Controller
{
    public function __invoke()
    {
        return Group::collection(Stats::all());
    }
}
