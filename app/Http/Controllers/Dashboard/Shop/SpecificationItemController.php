<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\specificationItem;
use App\Specification;
use App\Http\Requests\SpecificationItemRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecificationItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

      public function main($id){
        $shop = \Auth::user()->shop()->first();
        $specification = Specification::find($id);
        $specificationItems = $specification->items;
        return view('dashboard.shop.specification-item' , compact('specification' , 'shop','specificationItems'));
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
    public function store(SpecificationItemRequest $request)
    {
      switch ($request->input('action')) {
        //save and close modal
          case 'justSave':
                  $specificationItem = new SpecificationItem;
                  $specificationItem->name = $request->name;
                  $specificationItem->price = $request->price;
                  $specificationItem->specification_id = $request->specification_id;
                  $specificationItem->save();
                  alert()->success('خصوصیت جدید شما باموفقیت اضافه شد.', 'ثبت شد');
                  return redirect()->back();
              break;
          //save and open new modal
          case 'saveAndContinue':
                  $specificationItem = new SpecificationItem;
                  $specificationItem->name = $request->name;
                  $specificationItem->price = $request->price;
                  $specificationItem->specification_id = $request->specification_id;
                  $specificationItem->save();
                  session()->flash('flashModal');
                  alert()->success('خصوصیت جدید شما باموفقیت اضافه شد.', 'ثبت شد');
                  return redirect()->back();
              break;
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\specificationItem  $specificationItem
     * @return \Illuminate\Http\Response
     */
    public function show(specificationItem $specificationItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\specificationItem  $specificationItem
     * @return \Illuminate\Http\Response
     */
    public function edit(specificationItem $specificationItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\specificationItem  $specificationItem
     * @return \Illuminate\Http\Response
     */
    public function update(SpecificationItemRequest $request, specificationItem $specificationItem)
    {
        $specificationItem = \Auth::user()->shop()->first()->specifications()->where('id',$request->specificationId)->get()->first()->items()->where('id', $specificationItem->id)->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);


        alert()->success(' گزینه شما با موفقیت ویرایش شد.', 'ثبت شد');
        return redirect()->back();
    }



    public function changeStatus(Request $request){

        $specificationItem = SpecificationItem::find($request->id);
        if($specificationItem->status == 'disable')
            $specificationItem->status = 'enable';
        else
            $specificationItem->status = 'disable';
        $specificationItem->save();
        return back();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\specificationItem  $specificationItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(specificationItem $specificationItem, Request $request)
    {
      $specificationItem = SpecificationItem::find($request->id);
      if ($specificationItem->specification->shop->user_id !== \Auth::user()->id) {
              alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
              return redirect()->back();
            }
               $specificationItem->delete();
               alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
               return redirect()->back();
    }
}
