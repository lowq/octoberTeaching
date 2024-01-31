<?php

namespace AppChat\Chat\Http\Controllers;

use AppChat\Chat\Models\Chat;
use AppUser\User\Models\User;
use Backend\Classes\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            "name" => 'required|string',
            'chatPartner' => 'required|integer',
        ]);

        $chat = Chat::create([
            'name' => $data['name'],
        ]);

        $partnerUser = User::where('id', $data['chatPartner'])->first();
        $creatingUser = User::where('id', $request->user->id)->first();

        $chat->users->attach($partnerUser);
        $chat->users->attach($creatingUser);

        return response()->json($chat);
    }

    public function getAllChats(Request $request)
    {
        $user = User::where('id', $request->user->id)->first();

        if ($user->chats()->count() > 0) {
            return response()->json($user->chats);
        } else {
            return response()->json();
        }
    }
}
