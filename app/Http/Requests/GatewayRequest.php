<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GatewayRequest extends FormRequest
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
            'name' => 'required|min:1|max:20',
            'url' =>  'required|min:5|max:200',
            'category' =>  'required|min:1|max:60',
            'description' =>  'required|min:1|max:200',
            'wallet_id' =>  'required|exists:wallets,id',
        ];
    }
}
