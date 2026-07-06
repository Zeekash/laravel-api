<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Event;

class LogRequest
{
    public function handle(Request $request, Closure $next)
    {
        // Make it an after middleware
        $response = $next($request);

        try {
            Event::create([
                'type' => 'pageview',
                'attribute' => $request->url(),
                'useragent' => $request->userAgent(),
                'visitor_ip' => $request->ip(),
            ]);

            return $response;
        } catch (Error $e) {
            report($e);
            return $response;
        }
    }
}
