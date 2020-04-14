<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'city' => 'required|min:1|max:20|regex:/^[\pL\s\-]+$/u',
            'province' => 'required|min:1|max:20|regex:/^[\pL\s\-]+$/u',
            'address' => 'required|min:1|max:400|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي. ]+$/u',
        ];
    }
}
