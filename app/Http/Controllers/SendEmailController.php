<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{

    function send(Request $request)
    {

     $this->validate($request, [
      'name'     =>  'required|min:1|max:10000',
      'email'  =>  'required|email|min:1|max:100000',
      'message' =>  'required|min:1|max:1000000000000'
     ]);

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message,
            'email'   =>   $request->email
        );
     Mail::to('hassankhosrojerdi@yahoo.com')->send(new SendMail($data));
     alert()->success('امتیاز شما با موفقیت ثبت شد', 'انجام شد');
     return redirect()->route('index');

    }
}

?>
