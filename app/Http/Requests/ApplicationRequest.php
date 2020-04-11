<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Shop;


class ApplicationRequest extends FormRequest
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
          'title' => 'required|min:1|max:150',
          'color_1' => 'required|max:150',
          'color_2' => 'required|max:150',
          'color_3' => 'required|max:150',
          'icon' => 'mimes:jpeg,png,jpg,gif|max:2048',
      ];
    }
}
