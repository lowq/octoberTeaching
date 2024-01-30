<?php

namespace AppUser\User\Services;

use AppUser\User\Models\User;

class UserService
{
    public function getAutheticatedUser($token)
    {
        return User::where('token', $token)->first();
    }
}
