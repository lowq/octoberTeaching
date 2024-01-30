<?php

use AppLogger\Logger\Http\Controllers\LogsController;

Route::post('applogger/logger/logs', [LogsController::class, 'create']);
Route::get('applogger/logger/logs', [LogsController::class, 'getAllLogs']);
Route::get('applogger/logger/logs/{username}', [LogsController::class, 'getLogByUsername']);
