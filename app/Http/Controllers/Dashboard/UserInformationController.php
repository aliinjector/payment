<?php

namespace App\Http\Controllers\Dashboard;

use App\UserInformation;
use App\Http\Requests\UserInformationRequest;
use Illuminate\Http\Request;

class UserInformationController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->userInformation()->count() == 0){
            $userInformation = new UserInformation;
            $userInformation->user_id = \Auth::user()->id;
            $userInformation->status = 1;
            $userInformation->save();
        }

        $userInformation = \Auth::user()->userInformation()->first();
        return view('dashboard.userInformation', compact('userInformation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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




    /**
     * Display the specified resource.
     *
     * @param  \App\UserInformation  $userInformation
     * @return \Illuminate\Http\Response
     */
    public function show(UserInformation $userInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserInformation  $userInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(UserInformation $userInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserInformation  $userInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserInformation $userInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserInformation  $userInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserInformation $userInformation)
    {
        //
    }
}
