<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
          'type' => 'required|in:all,file,service,product',
          'minprice' =>  'required|numeric|min:0|max:1000000000000',
          'maxprice' =>  'required|numeric|min:0|max:100000000000000',
          'color' =>  'min:0|max:7',
          'sortBy' =>  'required',
          'sortBy.field' => 'in:created_at,buyCount,price',
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
