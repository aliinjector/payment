<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Slideshow;
use App\ErrorLog;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlideShowRequest;



class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $shop = \Auth::user()->shop()->first();
      $slideshows = \Auth::user()->shop()->first()->slideshows()->get();
      $slideshowIds = collect();
      foreach($slideshows as $slideshow){
        $slideshowIds[] = $slideshow->id;
      }
      SEOTools::setTitle($shop->name . ' | اسلایدر');
      SEOTools::setDescription($shop->name);
      SEOTools::opengraph()->addProperty('type', 'website');
      return view('dashboard.shop.slideshow', compact('slideshows' , 'shop','slideshowIds'));

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
     public function store(SlideShowRequest $request)
       {
           $request->validate(['image' => 'required']);
           $image = $this->uploadFile($request->file('image'), false, true);
           switch ($request->input('action')) {
             //save and close modal
               case 'justSave':
                       $slideshow = new Slideshow;
                       $slideshow->title = $request->title;
                       $slideshow->url = $request->url;
                       $slideshow->description = $request->description;
                       $slideshow->image = $image;
                       $slideshow->shop_id = \Auth::user()->shop()->first()->id;
                       $slideshow->save();
                       alert()->success('اسلاید جدید شما باموفقیت اضافه شد.', 'ثبت شد');
                       return redirect()->route('slideshow.index');
                   break;
               //save and open new modal
               case 'saveAndContinue':
                       $slideshow = new Slideshow;
                       $slideshow->title = $request->title;
                       $slideshow->description = $request->description;
                       $slideshow->url = $request->url;
                       $slideshow->image = $image;
                       $slideshow->shop_id = \Auth::user()->shop()->first()->id;
                       $slideshow->save();
                       session()->flash('flashModal');
                       alert()->success('اسلاید جدید شما باموفقیت اضافه شد.', 'ثبت شد');
                       return redirect()->route('slideshow.index');
                   break;
                 }

       }


    /**
     * Display the specified resource.
     *
     * @param  \App\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function show(Slideshow $slideshow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function edit(Slideshow $slideshow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function update(SlideShowRequest $request, $id)
    {
      if($request->file('image') == null){
        $image = \Auth::user()->shop()->first()->slideshows()->where('id',$id)->get()->first()->image;
      }
      else{
        $image = $this->uploadFile($request->file('image'), false, true);
      }

        $slideshow = \Auth::user()->shop()->first()->slideshows()->where('id',$id)->get()->first()->update([
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
            'image' => $image
        ]);


        alert()->success(' اسلاید شما با موفقیت ویرایش شد.', 'ثبت شد');
        return redirect()->route('slideshow.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slideshow $slideshow, Request $request)
    {
      $request->validate([
        'id' => 'required|numeric|min:1|max:10000000000|regex:/^[0-9]+$/u',
  ]);
      $slideshow = Slideshow::find($request->id);
      if ($slideshow->shop->user_id !== \Auth::user()->id) {
              alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
              return redirect()->back();
            }
               $slideshow->delete();
               alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
               return redirect()->back();
           }
    }
