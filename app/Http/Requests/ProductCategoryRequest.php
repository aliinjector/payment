<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Shop;


class ProductCategoryRequest extends FormRequest
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
          'name' => 'required|max:60|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
          'icon' => 'mimes:jpeg,png,jpg,gif|max:2048',
          'parent_id' => 'required|min:1|max:10000000000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي ]+$/u',
          'description' => 'nullable|max:500|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
      ];
    }
}
