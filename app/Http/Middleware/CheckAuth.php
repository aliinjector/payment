<?php

namespace App\Http\Middleware;

use App\Shop;
use Closure;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(strstr($request->route()->getPrefix(),"admin-panel") && \Auth::user()->type != 'user'){
            if(\Auth::user()->type == 'customer' && \Auth::user()->shop_id != null){
                $shop = Shop::where('id', \Auth::user()->shop_id)->first();
                return redirect()->route('shop', $shop->english_name);
            }else{
                return redirect()->route('logout');
            }
        }

        if (\Auth::check() && strstr($request->route()->getPrefix(),"admin-panel") && isset(\Auth::user()->userInformation)) {
            if (\Auth::user()->userInformation->status <= 4) {
                if ($request->route()->getName() == 'UserInformation.index' OR $request->route()->getName() == 'UserInformation.store' OR $request->route()->getName() == 'melliUpload' OR $request->route()->getName() == 'ShensnamehUpload' OR $request->route()->getName() == 'verification.sms' OR $request->route()->getName() == 'verification.email' OR $request->route()->getName() == 'logout') {
                    return $next($request);
                } else {
                    return redirect()->route('UserInformation.index');
                }

            }else{
                return $next($request);
            }

        }else{
            return $next($request);
        }
    }
}
