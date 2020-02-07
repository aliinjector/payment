<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Shop;


class VoucherRequest extends FormRequest
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
          'name' => 'required|max:50',
          'description' => 'max:70',
          'type' => 'in:on',
          'first_purchase' => 'in:on',
          'disposable' => 'in:on',
          'users' => 'max:170',
          'discount_amount' => 'required|numeric|min:0|not_in:0',
          'starts_at' => 'required|numeric',
          'expires_at' => 'required|numeric|gt:starts_at',
        ];
    }
}
