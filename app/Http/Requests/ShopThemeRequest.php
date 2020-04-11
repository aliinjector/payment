<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Shop;


class ShopThemeRequest extends FormRequest
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
          'menu_show' => 'in:nestead_menu,nestead_box,mega_menu',
          'menu_show_count' => 'numeric|min:1|max:10',
          'cat_image_status' => 'in:enable,disable',
          'watermark_status' => 'in:enable,disable',
          'VAT' => 'in:enable,disable',
          'buyCount_show' => 'in:enable,disable',
          'special_offer' => 'in:enable,disable',
          'watermark' => 'mimes:jpeg,png,jpg,gif|max:2048',
          'special_offer_text' => 'min:1|max:150',
          'template_id' => 'numeric|min:1|max:50',
          'slide_category' => 'max:100',
        ];
    }
}
