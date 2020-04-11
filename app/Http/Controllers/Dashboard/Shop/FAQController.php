<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\FAQ;
use Illuminate\Http\Request;
use App\Http\Requests\FAQRequest;
use App\ErrorLog;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $shop = \Auth::user()->shop()->first();
      $faqs = $shop->faqs;
      SEOTools::setTitle($shop->name . ' | سوالات متداول');
      SEOTools::setDescription($shop->name);
      SEOTools::opengraph()->addProperty('type', 'website');
      return view('dashboard.shop.faq', compact('faqs' , 'shop'));
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
    public function store(FAQRequest $request)
    {
      switch ($request->input('action')) {
        //save and close modal
          case 'justSave':
                  $faq = new FAQ;
                  $faq->title = $request->title;
                  $faq->question = $request->question;
                  $faq->answer = $request->answer;
                  $faq->shop_id = \Auth::user()->shop()->first()->id;
                  $faq->save();
                  alert()->success('سوال جدید شما باموفقیت اضافه شد.', 'ثبت شد');
                  return redirect()->route('faq.index');
              break;
          //save and open new modal
          case 'saveAndContinue':
                  $faq = new FAQ;
                  $faq->title = $request->title;
                  $faq->question = $request->question;
                  $faq->answer = $request->answer;
                  $faq->shop_id = \Auth::user()->shop()->first()->id;
                  $faq->save();
                  session()->flash('flashModal');
                  alert()->success('سوال جدید شما باموفقیت اضافه شد.', 'ثبت شد');
                  return redirect()->route('faq.index');
              break;

      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $fAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $fAQ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function update(FAQRequest $request, $id)
    {
      $faq = \Auth::user()->shop()->first()->faqs()->where('id',$id)->get()->first()->update([
          'title' => $request->title,
          'question' => $request->question,
          'answer' => $request->answer,
      ]);


      alert()->success('سوال شما با موفقیت ویرایش شد', 'ثبت شد');
      return redirect()->route('faq.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $request->validate([
        'id' => 'required|numeric|min:1|max:10000000000',
  ]);
      $faq = FAQ::find($request->id);
      if ($faq->shop->user_id !== \Auth::user()->id) {
              alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
              return redirect()->back();
            }
               $faq->delete();
               alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
               return redirect()->back();
    }
}
