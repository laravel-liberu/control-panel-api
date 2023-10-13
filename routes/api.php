<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\ControlPanelApi\Http\Controllers\Action;
use LaravelLiberu\ControlPanelApi\Http\Controllers\Actions;
use LaravelLiberu\ControlPanelApi\Http\Controllers\DownloadLog;
use LaravelLiberu\ControlPanelApi\Http\Controllers\Statistics;

Route::name('apis.controlPanel.')
    ->prefix('apis/controlPanel')
    ->group(function () {
        Route::middleware(['api', 'auth:sanctum', 'core-api'])
            ->group(function () {
                Route::get('statistics', Statistics::class)->name('statistics');
                Route::get('actions', Actions::class)->name('actions');
                Route::any('{action}', Action::class)->name('action');
            });

        Route::middleware(['signed', 'bindings'])
            ->prefix('action')
            ->as('action.')
            ->group(fn () => Route::get('downloadLog', DownloadLog::class)->name('downloadLog'));
    });
