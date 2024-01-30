<?php

use AppUser\User\Http\Controllers\UserController;

Route::post('appuser/user/register', [UserController::class, 'register']);
Route::post('appuser/user/login', [UserController::class, 'login']);
