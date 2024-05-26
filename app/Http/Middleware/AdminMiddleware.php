<?php

// app/Http/Middleware/AdminMiddleware.php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->user() && auth()->user()->isAdmin()) {
            return $next($request);
        }
    
        abort(403, 'Unauthorized');
    }
    
    
}
