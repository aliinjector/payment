<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPurchasesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

      $userPurchases = \auth::user()->purchases;
      foreach ($userPurchases as $userPurchase) {
        foreach($userPurchase->cart()->withTrashed()->get() as $cart){
        if($cart->products->where('id', $this->request->all()['product_id'])->count() > 0){
          return true;
        }
        }
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
          'user_purchase_id' =>  'required|numeric|min:0|max:10000000000000000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
          'product_id' =>  'required|numeric|min:0|max:10000000000000000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',

        ];
    }
}
