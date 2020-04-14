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
      // dd(request()->all());
        return [
              'city' => 'required|min:1|max:20|regex:/^[\pL\s\-]+$/u',
              'province' => 'required|min:1|max:20|regex:/^[\pL\s\-]+$/u',
              'tel' => 'nullable|string|min:3|not_in:0|max:30|regex:/^[0-9\-۰-۹]+$/u',
              'address' => 'nullable|max:250|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
              'shop_email' => 'nullable', 'email', 'max:255',
              'telegram_url' => 'nullable|max:220|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي?:\/\/.@%_+~#=* ]+$/u',
              'instagram_url' => 'nullable|max:220|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي?:\/\/.@%_+~#=* ]+$/u',
              'facebook_url' => 'nullable|max:220|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي?:\/\/.@%_+~#=* ]+$/u',
              'soroush_url' => 'nullable|max:220|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي?:\/\/.@%_+~#=* ]+$/u',
              'bisphone_url' => 'nullable|max:220|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي?:\/\/.@%_+~#=* ]+$/u',
              'Igap_url' => 'nullable|max:220|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي?:\/\/.@%_+~#=* ]+$/u',
              'gap_url' => 'nullable|max:220|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي?:\/\/.@%_+~#=* ]+$/u',
              'wispi_url' => 'nullable|max:220|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي?:\/\/.@%_+~#=* ]+$/u',
              'bale_url' => 'nullable|max:220|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي?:\/\/.@%_+~#=* ]+$/u',
              'lat' => 'nullable|min:1|max:220|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي. ]+$/u',
              'lng' => 'nullable|min:1|max:220|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي. ]+$/u',
        ];
    }
}
