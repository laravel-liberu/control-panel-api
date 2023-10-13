<?php

namespace LaravelLiberu\ControlPanelApi\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\ControlPanelApi\Facades\Actions as Facade;
use LaravelLiberu\ControlPanelCommon\Http\Resources\Action as Response;

class Actions extends Controller
{
    public function __invoke()
    {
        return Response::collection(Facade::all());
    }
}
