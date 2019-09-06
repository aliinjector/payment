<?php

namespace App\Http\Controllers\Dashboard;

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
        return view('dashboard.ticket', compact('tickets'));
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
//        if ($request->file('attachment') != null){
//            $attachment = $this->uploadFile($request->file('attachment'), false, false);
//        }

        $ticket = new Ticket;
        $ticket->user_id = \Auth::user()->id;
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->scope = $request->scope;
//        $ticket->attachment = $attachment;
        $ticket->status = 'بررسی نشده';
        $ticket->save();

        alert()->success('تیکت شما باموفقیت اضافه شد.', 'ثبت شد');
        return redirect()->route('ticket.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
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
}
