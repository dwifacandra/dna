<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->ajax() || $request->is('api/*') || $this->isIgnoredRoute($request)) {
            return $next($request);
        }
        Visitor::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'page_visited' => $request->route()->getName(),
            'locale' => $request->get('locale', 'en'),
        ]);
        return $next($request);
    }
    protected function isIgnoredRoute(Request $request): bool
    {
        return str_starts_with($request->path(), 'svg');
    }
}
