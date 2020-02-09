<?php

namespace App\Http\Controllers\Dashboard\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductDownloadStatus;
use App\ErrorLog;
use Illuminate\Support\Facades\DB;

class DownloadLinkRequestController extends Controller
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
      }else{
      $shop = \Auth::user()->shop()->first();
      $requests = $shop->donwloadLinkRequests;
      return view('dashboard.shop.download-link-request', compact('requests', 'shop'));
          }
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $downloadLinkRequest = ProductDownloadStatus::find($request->id);
      if ($downloadLinkRequest->shop->user_id !== \Auth::user()->id) {
              alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
              return redirect()->back();
            }
               $downloadLinkRequest->delete();
               alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
               return redirect()->back();
    }



    public function acceptRequest(Request $request){
      $downloadLinkRequest = ProductDownloadStatus::find($request->id);
      if ($downloadLinkRequest->shop->user_id !== \Auth::user()->id) {
              alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
              return redirect()->back();
            }

              DB::beginTransaction();
         try {
           $downloadLinkRequest->purchase->cart()->withTrashed()->get()->first()->cartProduct()->where('product_id', $downloadLinkRequest->product_id)->get()->first()->update([
             'download_status' => '0'
           ]);
           $downloadLinkRequest->delete();
             DB::commit();
         } catch (\Exception $ex) {
             DB::rollback();
             return response()->json(['error' => $ex->getMessage()], 500);
         }
               alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
               return redirect()->back();

    }


}
