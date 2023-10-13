<?php

use LaravelLiberu\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $permissions = [
        ['name' => 'apis.controlPanel.statistics', 'description' => 'Get statistics', 'is_default' => false],
        ['name' => 'apis.controlPanel.actions', 'description' => 'Get available Actions', 'is_default' => false],
        ['name' => 'apis.controlPanel.action', 'description' => 'Do an action', 'is_default' => false],
    ];
};
