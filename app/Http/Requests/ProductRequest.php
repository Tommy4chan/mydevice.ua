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
    public function rules()
    {
        $rules = [
            'code' => 'required|min:3|max:255|alpha_dash|unique:products,code',
            'name' => 'required|min:3|max:255|unique:products,name',
            'description' => 'required|min:20',
            'price' => 'required|numeric|min:1',
            'count' => 'required|numeric|min:0',
            'image' => 'required'
        ];

        if($this->route()->named('products.update')){
            $rules['code'] .= ',' . $this->route()->parameter('product')->id;
            $rules['name'] .= ',' . $this->route()->parameter('product')->id;
            unset($rules['image']);
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute повинне бути заповненими',
        ];
    }
}
