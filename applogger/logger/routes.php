<?php

use AppLogger\Logger\Http\Controllers\LogsController;

Route::post('applogger/logger/logs', [LogsController::class, 'create'])->middleware('userAutheticate');
Route::get('applogger/logger/logs', [LogsController::class, 'getAllLogs'])->middleware('userAutheticate');
Route::get('applogger/logger/logs/{username}', [LogsController::class, 'getLogByUsername']);
