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
           'title' => 'required|max:100|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
           'value.*' => 'nullable|max:4000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
           'productCat_id' => 'required|numeric|min:1|max:10000000000|regex:/^[0-9]+$/u',
           'brand_id' => 'nullable|max:100000000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
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
           'color.*' => 'nullable|max:400|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
           'specifications.*' => 'nullable|max:400|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
           'tags' => 'nullable|max:500|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
           'facility.*' => 'nullable|max:300|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
           'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
         ];
       }
   else if($request->type == 'file'){
   return [
     'title' => 'required|max:100|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
     'value.*' => 'nullable|max:4000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
     'productCat_id' => 'required|numeric|min:1|max:10000000000|regex:/^[0-9]+$/u',
     'brand_id' => 'nullable|max:100000000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
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
     'tags' => 'nullable|max:500|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
     'facility.*' => 'nullable|max:300|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
     'specifications.*' => 'nullable|max:400|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
     'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
     'attachment' => 'mimes:doc,docx,pdf,zip,mp4,avi,webm,3gp,rar|max:50000',

   ];
   }
   else{
   return [
     'title' => 'required|max:100|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
     'value.*' => 'nullable|max:4000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
     'productCat_id' => 'required|numeric|min:1|max:10000000000|regex:/^[0-9]+$/u',
     'brand_id' => 'nullable|max:100000000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
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
     'tags' => 'nullable|max:500|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
     'facility.*' => 'nullable|max:300|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
     'specifications.*' => 'nullable|max:400|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
     'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
     ];
   }

     }
   }
