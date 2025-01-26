<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\{App, Session};

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        } else {
            App::setLocale(config('app.locale'));
        }
        return $next($request);
    }
}
