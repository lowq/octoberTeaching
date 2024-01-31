<?php

namespace AppChat\Chat\Models;

use Model;

/**
 * Chat Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Chat extends Model
{
    /**
     * @var string table name
     */
    public $table = 'appchat_chat_chats';

    protected $fillable = ['name'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public $belongsToMany = [
        'users' => ['AppUser\User\Models\User', 'table' => 'appchat_chat_chat_user']
    ];
}