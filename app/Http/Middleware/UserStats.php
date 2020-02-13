<?php

namespace App\Http\Middleware;

use App\Shop;
use Closure;
use Jenssegers\Agent\Agent;
use PulkitJalan\GeoIP\GeoIP;

class UserStats
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
        return $next($request);
    }
}
