<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class RemoveNullZone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (isNull($request->zone_id)) {
            unset($request['zone_id']);
        }
        return $next($request);
    }
}
