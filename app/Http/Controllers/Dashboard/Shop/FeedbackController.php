<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = \Auth::user()->shop()->first();
        $feedbacks = \Auth::user()->shop()->first()->feedbacks;
        return view('dashboard.shop.feedback' , compact('feedbacks' , 'shop'));
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
      $request->validate(['title' => 'required' , 'feedback' => 'required']);
      switch ($request->input('action')) {
        //save and close modal
          case 'justSave':
        $feedback = \Auth::user()->shop()->first()->feedbacks()->create($request->except(['_token', 'action', 'continue', 1]));
        alert()->success('بازخورد برای فروشگاه شما با موفقیت اضافه شد.', 'انجام شد');
        return redirect()->route('feedback.index');
        break;

          case 'saveAndContinue':
        $feedback = \Auth::user()->shop()->first()->feedbacks()->create($request->except(['_token', 'action', 'continue', 1]));
        session()->flash('flashModal');
        alert()->success('بازخورد برای فروشگاه شما با موفقیت اضافه شد.', 'انجام شد');
        return redirect()->route('feedback.index');
        break;
    }
  }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
