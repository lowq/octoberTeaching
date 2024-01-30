<?php

namespace AppLogger\Logger\Http\Controllers;

use AppLogger\Logger\Models\Logs;
use Backend\Classes\Controller;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string',
            'delay' => 'required|integer',
        ]);

        $log = Logs::create([
            'datetime' => now(),
            'username' => $data['username'],
            'delay' => $data['delay'],
        ]);

        return response()->json($log, 201);
    }

    public function getAllLogs()
    {
        $logs = Logs::all();
        return response()->json($logs);
    }

    public function getLogByUsername($username)
    {
        $logs = Logs::where('username', $username)->get();
        return response()->json($logs);
    }
}
