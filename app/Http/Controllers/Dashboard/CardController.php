<?php

namespace App\Http\Controllers\Dashboard;

use App\Card;
use App\Dashboard;
use App\Http\Requests\CardRequest;
use Illuminate\Http\Request;

class CardController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = \Auth::user()->cards()->get();
        return view('dashboard.card', compact('cards'));
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
    public function store(CardRequest $request)
    {
      $card = \Auth::user()->cards()->create($request->except('_token'));

        alert()->success('کارت بانکی موفقیت اضافه شد.', 'انجام شد');
        return redirect()->route('card.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(CardRequest $request, Card $card)
    {
        if ($card->user_id !== \Auth::user()->id){
            alert()->error('خطا', 'خطا');
            return redirect()->route('card.index');
            exit;
        }

        $card->number = $request->number;
        $card->bank = $request->bank;
        $card->status = 'در انتظار تایید';
        $card->month = $request->month;
        $card->year = $request->year;
        $card->save();

        alert()->success('کارت بانکی موفقیت ویرایش شد.', 'انجام شد');
        return redirect()->route('card.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      // if ($card->user_id !== \Auth::user()->id){
      //     alert()->error('خطا', 'خطا');
      //     return redirect()->route('card.index');
      //     exit;
      // }


      $card = \Auth::user()->cards()->find($request->id)->delete();

      // dd($shop->ProductCategories->first());
      //   $card = Card::find($request->id);
      //   $card->delete();
        
        alert()->success('کارت بانکی موفقیت حذف شد.', 'انجام شد');
        return redirect()->route('card.index');

    }
}
