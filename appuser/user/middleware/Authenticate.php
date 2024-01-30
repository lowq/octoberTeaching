<?php


namespace App\Http\Middleware;

use AppUser\User\Services\UserService;
use Closure;
use Illuminate\Routing\Controllers\Middleware;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next)
    {
        $token = $request->header('Authorization');
        $user = (new UserService)->getAutheticatedUser($token);

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $request->user = $user;

        return $next($request);
    }
}
