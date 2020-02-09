<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Shop;


class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function authorize()
     {
       $shop_userid = Shop::where('english_name', \request('shop'))->get()->first()->user_id;
       if($shop_userid == \auth::user()->id){
         return true;
       }
       else{
         return false;
       }
     }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sign' => 'in:enable,disable',
            'logo' => 'in:enable,disable',
            'date' => 'in:enable,disable',
            'number' => 'in:enable,disable',
            'custom_info' => 'in:enable,disable',
            'seller_info' => 'in:enable,disable',
            'address' => 'in:enable,disable',
            'tel' => 'in:enable,disable',
            'economic_code' => 'in:enable,disable',
            'registration_number' => 'in:enable,disable',
            'vat' => 'in:enable,disable',
            'description_status' => 'in:enable,disable',
            'motto' => 'in:enable,disable',
            'economic_code_number' => 'max:50',
            'registration_number‌_number' => 'max:50',
            'description' => 'max:70',
            'motto_text' => 'max:50',
        ];
    }
}
