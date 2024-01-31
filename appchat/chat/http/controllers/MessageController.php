<?php

namespace AppChat\Chat\Http\Controllers;

use AppChat\Chat\Models\Message;
use AppUser\User\Models\User;
use Backend\Classes\Controller;
use Illuminate\Http\Request;
use System\Models\File;

class MessageController extends Controller
{
    public function create(Request $request)
    {
        $message = $request->validate([
            'message' => 'string',
            'chatId' => 'required|interger'
        ]);

        $file = post('file');

        if (file_exists($file)) {
            $uploadedFile = new File;
            $uploadedFile->data = $file; // The uploaded file data
            $uploadedFile->save();
            $newMessage = Message::create(
                [
                    'fileId' => $uploadedFile->id,
                    'appchat_chat_chats_id' => $message['chatId']
                ]
            );
        } else {
            $newMessage = Message::create(
                [
                    'message' => $message['message'],
                    'appchat_chat_chats_id' => $message['chatId']
                ]
            );
        }

        return response()->jsnon($newMessage);
    }

    public function getAllMessages(Request $request)
    {
        $user = User::where('id', $request->user->id)->first();

        return response()->json($user->chats->messages);
    }

    public function getFile(Request $request)
    {
        $fileId = $request->validate([
            'fileId' => 'required|integer',
        ]);

        $file = File::find($fileId);

        return response($file);
    }
}
