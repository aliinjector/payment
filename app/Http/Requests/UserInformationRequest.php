<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInformationRequest extends FormRequest
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
            'firstName' => 'required|min:1|max:24',
            'lastName' => 'required|min:1|max:24',
            'fatherName' => 'required|min:1|max:24',
            'mobile' => 'required|min:1|max:20',
            'tel' => 'required|min:1|max:20',
            'city' => 'required|min:1|max:20',
            'address' => 'required|min:1|max:220',
            'nationalCode' => 'required|min:1|max:10',
            'shenasnamehCode' => 'required|min:1|max:10',
            'placeOfIssue' => 'required|min:1|max:50',
            'birthDate' => 'required|min:1|max:20',
            'zipCode' => 'required|min:1|max:10',
            'shenasnamehPic' => 'required|min:1|max:220',
            'melliCardPic' => 'required|min:1|max:220',
            'status' => 'required|min:1|max:20',
        ];
    }
}
