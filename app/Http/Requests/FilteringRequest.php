<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class FilteringRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      if($this->request->count() > 0){

        return [
          'type' => 'in:all,file,service,product',
          'minprice' =>  'numeric|min:0|max:1000000000000',
          'maxprice' =>  'numeric|min:0|max:100000000000000',
          'color' =>  'min:0|max:7',
          'sortBy.field' => Rule::in(['created_at', 'buyCount', 'price', "price|asc", "created_at|asc", "buyCount|asc", "buyCount|desc", "created_at|desc", "price|desc"]),
          'sortBy.orderBy' => 'in:asc,desc',
        ];
              }
              else{
                return [
                  //
                ];
              }
    }
}
