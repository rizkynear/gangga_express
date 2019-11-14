<?php

namespace App\Http\Middleware;

use Closure;
use LaravelLocalization;

class LocalizeApiRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        LaravelLocalization::setLocale($request->header('X-App-Locale') ?: config('app.locale'));
        
        return $next($request);
    }
}
