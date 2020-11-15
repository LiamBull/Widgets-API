<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TokenAuthentication
{
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header('Authorization', '');

        if (!Str::startsWith($header, 'Bearer ') || !Hash::check(Str::substr($header, 7), config('auth.token'))) {
            abort(401, 'Invalid token');
        }

        return $next($request);
    }
}
