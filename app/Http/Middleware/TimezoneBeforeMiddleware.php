<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimezoneBeforeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $date = Carbon::now('Pacific/Honolulu');
        $request->merge(['honolulu_datetime' => $date]);
        return $next($request);
    }
}
