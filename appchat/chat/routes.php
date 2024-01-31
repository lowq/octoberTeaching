<?php

use AppChat\Chat\Http\Controllers\ChatController;
use AppChat\Chat\Http\Controllers\EmojiController;
use AppChat\Chat\Http\Controllers\MessageController;

Route::post('appchat/chat/chat', [ChatController::class, 'create'])->middleware('userAutheticate');
Route::get('appchat/chat/chat', [ChatController::class, 'getAllChats'])->middleware('userAutheticate');

Route::get('appchat/chat/emojis', [EmojiController::class, 'getAllEmojis'])->middleware('userAutheticate');
Route::post('appchat/chat/setEmojiToMessage', [EmojiController::class, 'setEmojiToMessage'])->middleware('userAutheticate');
Route::post('appchat/chat/removeEmojiToMessage', [EmojiController::class, 'removeOneEmojiToMessage'])->middleware('userAutheticate');

Route::post('appchat/chat/message', [MessageController::class, 'create'])->middleware('userAutheticate');
Route::get('appchat/chat/message', [MessageController::class, 'getAllMessages'])->middleware('userAutheticate');
Route::get('appchat/chat/getFile', [MessageController::class, 'getFile'])->middleware('userAutheticate');
