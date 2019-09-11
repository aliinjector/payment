<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckoutRequest extends FormRequest
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
            'amount' => 'integer|between:1000,1000000',
            'id' => [
                'required',
                Rule::exists('cards')->where(function ($query) {
                    $query->where('user_id', \Auth::user()->id);
                }),
                ],

        ];
    }
}
