<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
          'total_price' => 'numeric',
          'product_id' => 'min:1|max:100000',
          'color' => 'min:1|max:100000',
          'specification' => 'min:1|max:100000',
        ];
    }
}
