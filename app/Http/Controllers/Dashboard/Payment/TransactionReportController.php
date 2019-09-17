<?php

namespace App\Http\Controllers\Dashboard\Payment;

use App\Gateway;
use App\Ticket;
use App\Http\Requests\TicketRequest;
use App\Wallet;
use Illuminate\Http\Request;

class TransactionReportController extends \App\Http\Controllers\Controller
{
    public function walletReport(Wallet $wallet)
    {
        if ($wallet->user_id !== \Auth::user()->id){
            alert()->error('خطا', 'خطا');
            return redirect()->route('wallet.index');
            exit;
        }

        $checkouts = \Auth::user()->checkouts()->get();
        return view('dashboard.payment.checkout', compact('checkouts'));
    }

    public function gatewayReport(Wallet $wallet)
    {
        if ($wallet->user_id !== \Auth::user()->id){
            alert()->error('خطا', 'خطا');
            return redirect()->route('wallet.index');
            exit;
        }

        $checkouts = \Auth::user()->checkouts()->get();
        return view('dashboard.payment.checkout', compact('checkouts'));
    }


}
