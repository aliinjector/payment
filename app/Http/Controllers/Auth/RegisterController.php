<?php

namespace App\Http\Controllers\Auth;

use App\Jobs\SendRegisterSms;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin-panel/shop/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'min:2', 'max:25'],
            'lastName' => ['required', 'string', 'min:2', 'max:25'],
            'mobile' => ['required', 'string','min:11' , 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
if(!isset($data['shop_id'])){
    $data['shop_id'] = null;
    $data['type'] = 'user';
}
else{
  $data['type'] = 'customer';
}
        $user = User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'type' => $data['type'],
            'shop_id' => $data['shop_id'],
            'password' => Hash::make($data['password']),
        ]);

//        $this->dispatch(new SendRegisterSms($user));
        return $user;

    }
}
