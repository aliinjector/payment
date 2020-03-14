<?php

namespace App\Http\Middleware;

use Closure;

class PreventDirectAccessToPreOrder
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
      if($request->has('_token') and csrf_token() == $request->_token and app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName() == 'user-cart'){
        \Session::put('checkDirectAccess', \auth::user()->id . \auth::user()->cart->id . \auth::user()->cart->created_at->timestamp);
        return $next($request);

    }else {
      \abort('403');
    }
    }
}
