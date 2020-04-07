<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserPanelUpdateRequest extends FormRequest
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
        'firstName' => ['required', 'string', 'min:2', 'max:25'],
        'lastName' => ['required', 'string', 'min:2', 'max:25'],
        'email' => ['required', 'string', 'email', 'max:255', 'sometimes',Rule::unique('users')->ignore(\auth()->user()->id)],
        'mobile' => ['required', 'string','min:11' , 'max:11', Rule::unique('users')->ignore(\auth()->user()->id)],
        'icon' => 'mimes:jpeg,png,jpg,gif|max:2048',
      ];
    }
}
