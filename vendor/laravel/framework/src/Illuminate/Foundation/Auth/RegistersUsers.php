<?php

namespace Illuminate\Foundation\Auth;

use App\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Request as RequestFacade;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        if(RequestFacade::server('HTTP_REFERER') === route('index').'/' or RequestFacade::server('HTTP_REFERER') === route('login')){
            return view('auth.register');
        }
        else{
            $base_url = parse_url(RequestFacade::server('HTTP_REFERER'),PHP_URL_PATH);
            $uri = ltrim($base_url, '/');
            $shopName = explode('/',$uri);
            if(Shop::where('english_name' , $shopName[0])->get()->count() == 0){
              $shop_id = null;
            }
            else{
            $shop_id = Shop::where('english_name' , $shopName[0])->get()->first()->id;
            }
            return view('auth.registerUser',compact('shop_id'));
        }
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
