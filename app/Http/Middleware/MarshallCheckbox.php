<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MarshallCheckbox
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
        $admin = false;
        if ($request->admin_flag == 'on') {
            $admin = true;
        }
        $request->merge(['admin_flag' => $admin]);
        return $next($request);
    }
}
