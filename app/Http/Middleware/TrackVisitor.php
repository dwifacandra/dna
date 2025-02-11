<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
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
                'page_path' => $request->getRequestUri(),
                'page_referer' => $request->headers->get('referer'),
                'route_name' => $request->route()->getName(),
                'route_query' => $request->query(),
                'user_name' => Auth::user()->name ?? null,
            ],
            'locale' => Session::get('locale', $request->get('locale', 'en')),
        ]);
        return $next($request);
    }
    protected function isIgnoredRoute(Request $request): bool
    {
        $ignoredPrefixes = ['svg', 'core', 'livewire', 'media'];
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
