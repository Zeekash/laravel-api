<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceLowercaseUrl
{
    public function handle(Request $request, Closure $next)
    {
        $uri = $request->getRequestUri();

        // Parse URL
        $parsed = parse_url($uri);
        $path = $parsed['path'] ?? '';
        $query = isset($parsed['query']) ? '?' . $parsed['query'] : '';

        // Exclude assets & important folders
        if (preg_match('#^/(assets|backend|js|css|images|storage|vendor)#i', $path)) {
            return $next($request);
        }

        $lowerPath = strtolower($path);

        // Redirect only if uppercase exists
        if ($path !== $lowerPath) {
            return redirect($lowerPath . $query, 301);
        }

        return $next($request);
    }
}