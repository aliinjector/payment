<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Shop;


class ProductUpdateRequest extends FormRequest
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
     public function rules(Request $request)
     {
       if ($request->type == 'product') {
         return [
           'title' => 'required|max:100',
           'value' => 'max:4000',
           'productCat_id' => 'required|numeric|min:1|max:10000000000',
           'brand_id' => 'max:100000000',
           'description' => 'required|min:10|max:4000',
           'amount' => ['required',
           'regex:/^([0-9]+$)|^([۰-۹]+$)/','max:999999','min:0'
         ],
         'min_amount' => ['required',
         'regex:/^([0-9]+$)|^([۰-۹]+$)/','max:999999','min:0'
       ],
           'measure' => 'required|max:50',
           'price' => ['required',
           'regex:/^([0-9]+$)|^([۰-۹]+$)/','max:99999999999999999','min:0'
         ],
         'off_price' => ['nullable','lt:price',
         'regex:/^([0-9]+$)|^([۰-۹]+$)/','max:99999999999999999','min:0'
       ],
         'weight' => ['nullable',
         'regex:/^([0-9]+$)|^([۰-۹]+$)/','max:99999999','min:0'
       ],
           'fast_sending' => 'in:on',
           'money_back' => 'in:on',
           'support' => 'in:on',
           'secure_payment' => 'in:on',
           'discount_status' => 'in:on',
           'color' => 'max:400',
           'specifications' => 'max:400',
           'tags' => 'max:500',
           'facility' => 'max:300',
           'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
         ];
       }
   else if($request->type == 'file'){
   return [
     'title' => 'required|max:100',
     'value' => 'max:4000',
     'productCat_id' => 'required|numeric|min:1|max:10000000000',
     'brand_id' => 'max:100000000',
     'description' => 'required|min:10|max:4000',
     'price' => ['required',
     'regex:/^([0-9]+$)|^([۰-۹]+$)/','max:99999999999999999','min:0'
   ],
     'off_price' => ['nullable','lt:price',
     'regex:/^([0-9]+$)|^([۰-۹]+$)/','max:99999999999999999','min:0'
   ],
     'fast_sending' => 'in:on',
     'money_back' => 'in:on',
     'support' => 'in:on',
     'secure_payment' => 'in:on',
     'tags' => 'max:500',
     'facility' => 'max:300',
     'specifications' => 'max:400',
     'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
     'attachment' => 'required|mimes:doc,docx,pdf,zip,mp4,avi,webm,3gp,rar|max:50000',

   ];
   }
   else{
   return [
     'title' => 'required|max:100',
     'value' => 'max:4000',
     'productCat_id' => 'required|numeric|min:1|max:10000000000',
     'brand_id' => 'max:100000000',
     'description' => 'required|min:10|max:4000',
     'fast_sending' => 'in:on',
     'money_back' => 'in:on',
     'support' => 'in:on',
     'secure_payment' => 'in:on',
     'price' => ['required',
     'regex:/^([0-9]+$)|^([۰-۹]+$)/','max:99999999999999999','min:0'
   ],
     'off_price' => ['nullable','lt:price',
     'regex:/^([0-9]+$)|^([۰-۹]+$)/','max:99999999999999999','min:0'
   ],
     'tags' => 'max:500',
     'facility' => 'max:300',
     'specifications' => 'max:400',
     'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
     ];
   }

     }
   }
