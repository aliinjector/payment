<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

class SubscribersController extends \App\Http\Controllers\Controller
{
    public function subscribe(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            alert()->error('فرمت ایمیل اشتباه است.', 'ناموفق');
            return redirect()->back();
        }

        $subscriber = \Auth::user()->shop()->first()->subscribers()->create([
            'email' => $request->input('email')
        ]);
        alert()->success('شما با موفقیت عضو خبرنامه شدید.', 'انجام شد');
        return redirect()->back();
    }
}
