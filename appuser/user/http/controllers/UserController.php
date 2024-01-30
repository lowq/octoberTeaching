<?php

namespace AppUser\User\Http\Controllers;

use AppUser\User\Models\User;
use Backend\Classes\Controller;
use Hash;

class UserController extends Controller
{
    public function register($request)
    {
        // Validácia dát
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'username' => 'required|string|unique:users',
        ]);

        // Vytvorenie nového uzívateľa
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'token' => str_random(50), // Vytvorenie náhodného tokenu
        ]);

        return response()->json(['token' => $user->token]);
    }

    public function login($request)
    {
        // Validácia dát
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Overenie prihlasovacích údajov
        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response()->json(['token' => $user->token]);
    }
}
