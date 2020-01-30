<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
          if(isset(request()->shop)){
            return redirect('/'.request()->shop);

          }
          if(Auth::user()->type == 'user'){
            return redirect()->route('dashboard.index');
          }
            return redirect()->route('user.purchased.list');
        }

        return $next($request);
    }
}
