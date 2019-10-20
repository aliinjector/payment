<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PurchaseAddedSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ini_set("soap.wsdl_cache_enabled", "0");
        $sms_client = new \SoapClient('http://api.payamak-panel.com/post/send.asmx?wsdl', array('encoding'=>'UTF-8'));

        $parameters['username'] = "riecocompany";
        $parameters['password'] = "8833";
        $parameters['to'] = $this->user->mobile;
        $parameters['from'] = "10001010111";
        $parameters['text'] ="سفارش شما در فروشگاه پایان پی ثبت شد. کد پیگیری: 000156";
        $parameters['isflash'] = false;

        echo $sms_client->SendSimpleSMS2($parameters)->SendSimpleSMS2Result;

    }
}
