<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
              'city' => 'required|min:1|max:20',
              'tel' => 'max:20',
              'address' => 'max:220',
              'telegram_url' => 'max:220',
              'instagram_url' => 'max:220',
              'facebook_url' => 'max:220',

        ];
    }
}
