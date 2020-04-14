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
          'name' => 'required|max:50|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
          'uses' => 'required|integer|gt:0',
          'description' => 'nullable|max:70|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
          'type' => 'in:on',
          'code' => 'unique:vouchers|min:1|max:50',
          'first_purchase' => 'in:on',
          'disposable' => 'in:on',
          'users.*' => 'nullable|max:500',
          'discount_amount' => ['required',
          'regex:/^([0-9]+$)|^([۰-۹]+$)/','max:99999999999999999','min:0'
        ],
          'starts_at' => 'required|numeric',
          'expires_at' => 'required|numeric|gt:starts_at',
        ];
    }
}
