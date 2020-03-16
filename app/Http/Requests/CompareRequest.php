<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Shop;


class CompareRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      if(\auth::user()){
        $currentShop = Shop::where('english_name', explode('/', url()->current())[3])->get()->first();
        $shopProducts = $currentShop->products;
        if($shopProducts->where('id', $this->request->all()['productID'])->count() > 0){
          return true;
        }
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
          'productID' =>  'required|numeric|min:0|max:10000000000000000',
        ];
    }
}
