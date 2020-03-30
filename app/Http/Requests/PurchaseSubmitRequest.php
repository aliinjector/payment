<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseSubmitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      if(\auth::user()){
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
          'shipping_way' => 'in:quick_way,posting_way,person_way',
          'payment_method' => 'required|in:cash_payment,online_payment',
          'new_address' => 'required_without:address|min:1|max:120|string|nullable',
          'address' => 'min:1|max:120|string'
        ];
    }
}
