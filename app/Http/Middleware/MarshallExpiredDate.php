<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MarshallExpiredDate
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
        if (isset($request->expiry_date) && (
            $request->isMethod('post') || $request->isMethod('patch'))
        ) {
            $request->merge(
                ['expiry_date' => Carbon::createFromFormat(
                    'm/d/Y',
                    $request->expiry_date
                )->format('Y-m-d')]
            );
        }
        return $next($request);
    }
}
