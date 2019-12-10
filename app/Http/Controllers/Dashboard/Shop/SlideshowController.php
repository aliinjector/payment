<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Slideshow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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

      return view('dashboard.shop.slideshow', compact('slideshows' , 'shop'));

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
        $image = $this->uploadFile($request->file('image'), false, true);

        switch ($request->input('action')) {
          //save and close modal
            case 'justSave':
                    $request->validate(['title' => 'required']);
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
                    $request->validate(['title' => 'required', 'image' => 'required']);
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
    public function update(Request $request, $id)
    {

        $image = $this->uploadFile($request->file('image'), false, true);

        $request->validate(['title' => 'required']);
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
