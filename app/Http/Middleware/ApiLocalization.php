<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiLocalization
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
        $locales = array_keys(config('app.app_locales'));

        if ($request->hasHeader('X-Locale') && in_array($request->header('X-Locale'), $locales)) {
            app()->setLocale($request->header('X-Locale'));
        }
        return $next($request);
    }
}
