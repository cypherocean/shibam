<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class ProductRequest extends FormRequest
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
    public function rules(){
        if($this->method() == 'PATCH'){
            return [
                'category' => 'required',
                'title' => 'required',
                'product_description' => 'required'
            ];
        }else{
            return [
                'category' => 'required',
                'title' => 'required',
                'product_description' => 'required',
            ];
        }
    }

    public function messages(){
        return [
            'category.required' => 'Please select category',
            'title.required' => 'Please enter title',
            'product_description.required' => 'Please enter product description'
        ];
    }
}
