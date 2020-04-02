<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Shop;


class ShopContactRequest extends FormRequest
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
              'city' => 'required|min:1|max:20|regex:/^[\pL\s\-]+$/u',
              'province' => 'required|min:1|max:20|regex:/^[\pL\s\-]+$/u',
              'tel' => 'nullable|string|min:3|not_in:0|max:30',
              'address' => 'max:250',
              'shop_email' => 'string', 'email', 'max:255',
              'telegram_url' => 'max:220',
              'instagram_url' => 'max:220',
              'facebook_url' => 'max:220',
              'soroush_url' => 'max:220',
              'bisphone_url' => 'max:220',
              'Igap_url' => 'max:220',
              'gap_url' => 'max:220',
              'wispi_url' => 'max:220',
              'bale_url' => 'max:220',

        ];
    }
}
