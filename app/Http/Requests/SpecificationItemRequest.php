<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Shop;


class SpecificationItemRequest extends FormRequest
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
        'name' => 'required|max:150|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
        'price' => ['required','max:9999999999',
        'regex:/^([0-9]+$)|^([۰-۹]+$)/'
        ]
      ];
    }
}
  // /^[\u0600-\u06FF\s۰-۱۰]+$/
