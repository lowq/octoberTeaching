<?php

namespace AppLogger\Logger\Http\Controllers;

use AppLogger\Logger\Models\Logs;
use AppUser\User\Models\User;
use Backend\Classes\Controller;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'delay' => 'required|integer',
        ]);

        $log = Logs::create([
            'datetime' => now(),
            'user_id' => $data['user_id'],
            'delay' => $data['delay'],
        ]);

        return response()->json($log, 201);
    }

    public function getAllLogs($request)
    {
        $logs = Logs::where('user_id', $request->user->id)->all();
        return response()->json($logs);
    }

    public function getLogByUsername($username)
    {
        $logs = User::where('username', $username)->hasMany(Logs::class);
        return response()->json($logs);
    }
}
