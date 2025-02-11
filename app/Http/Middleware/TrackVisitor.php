<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        if (
            $request->ajax() ||
            $request->is('api/*') ||
            $this->isIgnoredRoute($request) ||
            $this->isIgnoredUserAgent($request)
        ) {
            return $next($request);
        }
        Visitor::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'page_visited' => [
                'page_url' => $request->fullUrl(),
                'route_name' => $request->route()->getName(),
                'route_query' => $request->query(),
            ],
            'locale' => Session::get('locale', $request->get('locale', 'en')),
        ]);
        return $next($request);
    }
    protected function isIgnoredRoute(Request $request): bool
    {
        $ignoredPrefixes = ['svg', 'core', 'livewire'];
        foreach ($ignoredPrefixes as $prefix) {
            if (str_starts_with($request->path(), $prefix)) {
                return true;
            }
        }
        return false;
    }
    protected function isIgnoredUserAgent(Request $request): bool
    {
        return Str::contains($request->userAgent(), 'GuzzleHttp/7');
    }
}
