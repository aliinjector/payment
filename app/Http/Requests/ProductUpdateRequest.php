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
           'description' => 'required|min:10|max:1000',
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
           'color' => 'max:200',
           'tags' => 'max:200',
           'facility' => 'max:300',
         ];
       }
   else if($request->type == 'file'){
   return [
     'title' => 'required|max:100',
     'description' => 'required|min:10|max:1000',
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
     'tags' => 'max:200',
     'facility' => 'max:300',
   ];
   }
   else{
   return [
     'title' => 'required|max:100',
     'description' => 'required|min:10|max:1000',
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
     'tags' => 'max:200',
     'facility' => 'max:300',
     ];
   }

     }
   }
