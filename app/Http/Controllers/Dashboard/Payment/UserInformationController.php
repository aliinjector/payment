<?php

namespace App\Http\Controllers\Dashboard\Payment;

use App\Mail\SendMail;
use App\Mail\UserRegistred;
use App\Mail\UserVerification;
use App\UserInformation;
use App\Http\Requests\UserInformationRequest;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class UserInformationController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->wallets()->first() == null){
            $key = str_replace( '=' , '', base64_encode(mt_rand(0, 99) . time()  . substr(\Auth::user()->id, 0, 5)));
            $wallet = \Auth::user()->wallets()->create([
                'name' => 'کیف پول اصلی',
                'amount' => 0,
                'key' => $key,
            ]);
        }




        if(\Auth::user()->userInformation()->first() == null){
            \Auth::user()->userInformation()->create([
            'status' => 1,
            ]);
        }

        $userInformation = \Auth::user()->userInformation()->first();


        if($userInformation->status == 1){
            if(! $userInformation->sms_date >= Carbon::now()->subMinutes(10)->toDateTimeString()){
                    return redirect()->route('verification.sms');
            }
            if(! $userInformation->sms_date <= Carbon::now()->subMinutes(5)->toDateTimeString()){
                alert()->warning('کد تایید برای شما ارسال شده است.')->autoclose(5000);
            }
        }elseif($userInformation->status == 2){
            if(! $userInformation->email_date >= Carbon::now()->subMinutes(100)->toDateTimeString()){
                    return redirect()->route('verification.email');
            }
            if(! $userInformation->email_date <= Carbon::now()->subMinutes(100)->toDateTimeString()){
                alert()->warning('کد تایید ایمیل برای شما ارسال شده است.')->autoclose(5000);
            }

        }

        return view('dashboard.payment.userInformation', compact('userInformation'));
    }


    public function store(UserInformationRequest $request)
    {

        $userInformation = UserInformation::where('user_id', \Auth::user()->id)->first();
        $userInformation->fatherName = $request->fatherName;
        $userInformation->city = $request->city;
        $userInformation->address = $request->address;
        $userInformation->nationalCode = $request->nationalCode;
        $userInformation->shenasnamehCode = $request->shenasnamehCode;
        $userInformation->tel = $request->tel;
        $userInformation->placeOfIssue = $request->placeOfIssue;
        $userInformation->birthDate = $request->birthDate;
        $userInformation->zipCode = $request->zipCode;
        $userInformation->status = 2;
        $userInformation->save();

        alert()->success('حساب کاربری شما در مرحله انتظار تایید قرار گرفت.', 'اطلاعات بروز شد');
        return redirect()->route('UserInformation.index');

    }

    public function melliUpload(Request $request)
    {
        $request->validate([
            'melliCardPic' => 'required|mimes:jpg,png',
        ]);

        $melliCardPic = $this->uploadFile($request->file('melliCardPic'), false, false);

        $userInformation = UserInformation::where('user_id', \Auth::user()->id)->first();
        $userInformation->melliCardPic = $melliCardPic;
        $userInformation->status = 2;
        $userInformation->save();

        alert()->success('حساب کاربری شما در مرحله انتظار تایید قرار گرفت.', 'اطلاعات بروز شد');
        return redirect()->route('UserInformation.index');

    }



    public function ShensnamehUpload(Request $request)
    {
        $request->validate([
            'shenasnamehPic' => 'required|mimes:jpg,png',
        ]);

        $shenasnamehPic = $this->uploadFile($request->file('shenasnamehPic'), false, false);

        $userInformation = UserInformation::where('user_id', \Auth::user()->id)->first();
        $userInformation->shenasnamehPic = $shenasnamehPic;
        $userInformation->status = 2;
        $userInformation->save();

        alert()->success('حساب کاربری شما در مرحله انتظار تایید قرار گرفت.', 'اطلاعات بروز شد');
        return redirect()->route('UserInformation.index');

    }


    public function sms(Request $request)
    {

      $userInformation = \Auth::user()->userInformation()->first();

        if($request->mobileCode){
          if($request->mobileCode == $userInformation->sms_code){
            \Auth::user()->userInformation()->first()->update(['status' => 2]);
            alert()->success('موبایل شما تایید شد.')->autoclose(5000);
              $userInformation = \Auth::user()->userInformation()->first();
              return view('dashboard.payment.userInformation', compact('userInformation'));
          }else{
            alert()->error('کد وارد شده نادرست است.')->autoclose(5000);
            return view('dashboard.payment.userInformation', compact('userInformation'));
          }
        }

        $code = mt_rand(1111,9999);
        \Auth::user()->userInformation()->first()->update(['sms_date' => now(), 'sms_code' => $code]);


        $client = new Client();
        $res = $client->request('POST', 'https://rest.payamak-panel.com/api/SendSMS/SendSMS', [
          'form_params' => [
            'username' => 'riecocompany',
            'password' => '8833',
            'to' => \Auth::user()->mobile,
            'from' => '10001010111',
            'text' => "کد تایید: $code | امید شاپ",
          ]
        ]);


        alert()->success('کد پیامک شد', 'کد تایید ارسال شد.')->autoclose(5000);
        return view('dashboard.payment.userInformation', compact('userInformation'));
    }


    public function email(Request $request)
    {

        $userInformation = \Auth::user()->userInformation()->first();

        if($request->emailCode){
            if($request->emailCode == $userInformation->email_code){
                \Auth::user()->userInformation()->first()->update(['status' => 3]);
                alert()->success('ایمیل شما تایید شد.')->autoclose(5000);
                $userInformation = \Auth::user()->userInformation()->first();
                return view('dashboard.payment.userInformation', compact('userInformation'));
            }else{
                alert()->error('کد وارد شده نادرست است.')->autoclose(5000);
                return view('dashboard.payment.userInformation', compact('userInformation'));
            }
        }

        $code = mt_rand(1111,9999);
        \Auth::user()->userInformation()->first()->update(['email_date' => now(), 'email_code' => $code]);


            $data1 = array(
                'code'   =>   $code,
            );
            Mail::to(\Auth::user()->email)->send(new UserVerification($data1));


        alert()->success('کد ایمیل شد', 'کد تایید ارسال شد.')->autoclose(5000);
        return view('dashboard.payment.userInformation', compact('userInformation'));
    }

}
