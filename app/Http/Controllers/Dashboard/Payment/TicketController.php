<?php

namespace App\Http\Controllers\Dashboard\Payment;

use App\Answer;
use App\Buzz;
use App\Http\Requests\AnswerRequest;
use App\Ticket;
use App\Http\Requests\TicketRequest;
use Illuminate\Http\Request;

class TicketController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = \Auth::user()->tickets()->get();
        return view('dashboard.payment.ticket.index', compact('tickets'));
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
    public function store(TicketRequest $request)
    {
        // check if form uploaded !?
       if ($request->file('attachment') != null){
           $attachment = $this->uploadFile($request->file('attachment'), false, false);
       }

        $ticket = new Ticket;
        $ticket->user_id = \Auth::user()->id;
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->scope = $request->scope;
      if ($request->file('attachment') != null){
           $ticket->attachment = $attachment;
      }

        $ticket->status = 'بررسی نشده';
        $ticket->save();

        alert()->success('تیکت شما باموفقیت اضافه شد.', 'ثبت شد');
        return redirect()->route('ticket.index');

    }


    public function answer(AnswerRequest $request)
    {
        // check if form uploaded !?
        if ($request->file('attachment') != null){
            $attachment = $this->uploadFile($request->file('attachment'), false, false);
        }

        $answer = new Answer;
        $answer->user_id = \Auth::user()->id;
        $answer->ticket_id = $request->ticket_id;
        $answer->type = 'user';
        $answer->description = $request->description;
        if ($request->file('attachment') != null){
            $ticket->attachment = $attachment;
        }

        $answer->save();

        Ticket::find($request->ticket_id)->update(['status' => 'درانتظار بررسی']);


        alert()->success('پاسخ شما باموفقیت اضافه شد.', 'ثبت شد');
        return redirect()->route('ticket.show', $request->ticket_id);

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('dashboard.payment.ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    public function buzz(Ticket $ticket)
    {

       if(Buzz::where('ticket_id', $ticket->id)->where('status', 'بررسی نشده')->count() >= 1){
           alert()->warning('درخواست شما ثبت شده است.');
           return redirect()->route('ticket.show', $ticket->id);
       }

        $buzz = Buzz::create([
            'ticket_id' => $ticket->id,
            'user_id' => \Auth::user()->id,
            'status' => 'بررسی نشده',
        ]);

        alert()->success('موضوع پیگیری و با شما تماس گرفته خواهد شد.', 'ثبت شد');
        return redirect()->route('ticket.show', $ticket->id);
    }

}
