<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Specification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SpecificationRequest;


class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $shop = \Auth::user()->shop()->first();
      $specifications = \Auth::user()->shop()->first()->specifications;
      return view('dashboard.shop.specification' , compact('specifications' , 'shop'));
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
    public function store(SpecificationRequest $request)
    {

        switch ($request->input('action')) {
          //save and close modal
            case 'justSave':
                    $specification = new Specification;
                    $specification->name = $request->name;
                    $specification->type = $request->type;
                    $specification->shop_id = \Auth::user()->shop()->first()->id;
                    $specification->save();
                    alert()->success('خصوصیت جدید شما باموفقیت اضافه شد.', 'ثبت شد');
                    return redirect()->route('specification.index');
                break;
            //save and open new modal
            case 'saveAndContinue':
                    $specification = new Specification;
                    $specification->name = $request->name;
                    $specification->type = $request->type;
                    $specification->shop_id = \Auth::user()->shop()->first()->id;
                    $specification->save();
                    session()->flash('flashModal');
                    alert()->success('خصوصیت جدید شما باموفقیت اضافه شد.', 'ثبت شد');
                    return redirect()->route('specification.index');
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function show(Specification $specification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function edit(Specification $specification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function update(SpecificationRequest $request, Specification $specification)
    {
      $specification = \Auth::user()->shop()->first()->specifications()->where('id',$specification->id)->get()->first()->update([
          'name' => $request->name,
          'type' => $request->type,
      ]);


      alert()->success(' خصوصیت  شما با موفقیت ویرایش شد.', 'ثبت شد');
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specification $specification, Request $request)
    {
      {
        $specification = Specification::find($request->id);
        if ($specification->shop->user_id !== \Auth::user()->id) {
                alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
                return redirect()->back();
              }
                 $specification->delete();
                 alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
                 return redirect()->back();
      }
    }
}
