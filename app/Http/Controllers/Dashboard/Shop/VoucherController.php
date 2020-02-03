<?php

namespace App\Http\Controllers\Dashboard\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Shop;
use App\Voucher;
use App\UserVoucher;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->type == 'customer'){
            return redirect()->back();
        }
        $shop = \Auth::user()->shop()->first();
        $vouchers = \Auth::user()->shop()->first()->vouchers()->get();
        $usersFullName = [];
        foreach($shop->users as $user){
          $usersFullName[] = $user->firstName .' '.  $user->lastName . '-' .$user->email;
        }
        return view('dashboard.shop.voucher', compact('vouchers','shop' , 'usersFullName'));
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
    public function createRandomPassword() {
        $shopName = \Auth::user()->shop()->first()->english_name;
        $chars = "abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ023456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = $shopName.'-'.'' ;

        while ($i <= 4) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        return $pass;

    }

    public function store(Request $request)
    {
        $request->validate([
              'name' => 'required',
              'discount_amount' => 'required',
        ]);
        $realTimestampStart = substr($request->starts_at,0,10);
        $realTimestampExpire = substr($request->expires_at,0,10);

        if($request->type != "on")
        $request->type = 'percentage';
        else
        $request->type = 'number';
        if ( $request->first_purchase != "on")
        $request->first_purchase = 'disable';
        else
        $request->first_purchase = 'enable';

        if ( $request->disposable != "on")
        $request->disposable = 'disable';
        else
        $request->disposable = 'enable';
        $voucher = \Auth::user()->shop()->first()->vouchers()->create([
            'name' => $request->name,
            'shop_id' => $request->shop_id,
            'code' => $this->createRandomPassword(),
            'description' => $request->description,
            'type' => $request->type,
            'uses' => $request->uses,
            'discount_amount' => $request->discount_amount,
            'users' => $request->users,
            'first_purchase' => $request->first_purchase,
            'disposable' => $request->disposable,
            'starts_at' => date('Y-m-d H:i:s', (int)$realTimestampStart),
            'expires_at' => date('Y-m-d H:i:s', (int)$realTimestampExpire),
          ]);
          alert()->success('کد جدید شما باموفقیت اضافه شد.', 'ثبت شد');
          return redirect()->route('vouchers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $realTimestampStart = substr($request->starts_at,0,10);
        $realTimestampExpire = substr($request->expires_at,0,10);
        $voucher = \Auth::user()->shop()->first()->vouchers()->where('id',$id)->get()->first()->update([
            'name' => $request->name,
            'shop_id' => $request->shop_id,
            'description' => $request->description,
            'uses' => $request->uses,
            'discount_amount' => $request->discount_amount,
            'starts_at' => date('Y-m-d H:i:s', (int)$realTimestampStart),
            'expires_at' => date('Y-m-d H:i:s', (int)$realTimestampExpire),
          ]);
          alert()->success('کد تخفیف شما باموفقیت ویرایش شد.', 'ثبت شد');
          return redirect()->route('vouchers.index');
    }

    public function changeStatus(Request $request){
        $voucher = Voucher::find($request->id);
        if($voucher->status == 0)
            $voucher->status = 1;
        else
            $voucher->status = 0;
        $voucher->save();

    }

    public function voucherReport(){
      $vouchersReports = \Auth::user()->shop()->first()->userVoucher;
      return view('dashboard.shop.voucher-report' , compact('vouchersReports'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $voucher = Voucher::where('id' , $request->id)->get()->first();
                 if ($voucher->shop()->get()->first()->user_id !== \Auth::user()->id) {
                     alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
                     return redirect()->back();
                 }

                 $voucherDelete = \Auth::user()->shop()->first()->vouchers()->where('id' , $request->id)->first()->delete();
                 alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
                  return redirect()->back();
    }
}
