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
      'name'     =>  'required',
      'email'  =>  'required|email',
      'message' =>  'required'
     ]);

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message
        );
     Mail::to('hassankhosrojerdi@yahoo.com')->send(new SendMail($data));
     alert()->success('امتیاز شما با موفقیت ثبت شد', 'انجام شد');
     return redirect()->route('index');

    }
}

?>
