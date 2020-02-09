<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Shop;


class ShopSettingRequest extends FormRequest
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
            'name' => 'required|min:1|max:50|alpha_dash',
            'description' => 'required|min:1|max:100',
            'quick_way' => 'in:on',
            'posting_way' => 'in:on',
            'person_way' => 'in:on',
            'online_payment' => 'in:on',
            'online_payment' => 'in:on',
            'cash_payment' => 'in:on',
            'quick_way_price' => 'nullable|numeric|min:0|max:99999999999999999',
            'posting_way_price' => 'nullable|numeric|min:0|max:99999999999999999',
            'person_way_price' => 'nullable|numeric|min:0|max:99999999999999999',
            'logo' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'mimes:jpeg,png,jpg,gif|max:2048',

      ];

    }
}
