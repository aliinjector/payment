<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Str;
use \Validator;


class AuthController extends \App\Http\Controllers\Controller

{


    public function login() {


        $validator = \Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response([
                'data' => $validator->errors(),
                'status' => 'error',
                'code' => 422
            ]);

        }
        $validatedData = request()->only('email', 'password');

        if(auth()->validate($validatedData)){
            auth()->attempt($validatedData);
            auth()->user()->update([
                'api_token' => Str::random(60),
                ]);

            return response([
                'data' => [
                    'user_id' => auth()->id(),
                    'api_token' => auth()->user()->api_token
                ],
                'status' => 'success',
                'code' => 200
            ]);

        }else{
            return response([
                'data' => 'عدم تطابق',
                'status' => 'error',
                'code' => 302
            ]);

        }


    }
}
