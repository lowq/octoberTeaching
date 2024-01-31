<?php

namespace AppUser\User\Models;

use AppLogger\Logger\Models\Logs;
use Model;

/**
 * User Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class User extends Model
{
    /**
     * @var string table name
     */
    public $table = 'appuser_user_users';

    protected $fillable = [
        'name', 'email', 'age', 'username', 'password', 'token',
        // Add other user information fields as needed
    ];

    protected $hidden = [
        'password', 'token'
        // Hide other sensitive fields as needed
    ];

    public function logs()
    {
        return $this->hasMany(Logs::class);
    }

    public $belongsToMany = [
        'chats' => ['AppChat\Chat\Models\Chat', 'table' => 'appchat_chat_chat_user']
    ];
}
