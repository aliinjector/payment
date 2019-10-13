<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;
use App\User;
use http\Env\Request;
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
            ], 422);

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
            ], 200);

        }else{
            return response([
                'data' => 'عدم تطابق',
                'status' => 'error',
            ], 302);

        }

    }


    public function user($api_token)
    {
            if (User::where('api_token', $api_token)->count() == 1){
            $user = User::where('api_token', $api_token)->first();

                return response([
                    'id' => $user->id,
                    'name' => $user->firstName . ' ' . $user->lastName,
                    'email' => $user->email,
                    'api_token' => $user->api_token,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                ], 200);

        }else{
            return [
                'Allow' => false,
            ];
        }

    }
}
