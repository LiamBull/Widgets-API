<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class AddXDayHeader
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // The default TZ is UTC, which I have left alone.
        $response->headers->set('X-Day', Carbon::now()->dayName);

        return $response;
    }
}
