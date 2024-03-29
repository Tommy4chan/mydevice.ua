<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'code' => 'required|min:3|max:255|alpha_dash|unique:categories,code',
            'name' => 'required|min:3|max:255|unique:categories,name',
            'description' => 'required|min:20',
            'image' => 'required'
        ];

        if($this->route()->named('categories.update')){
            $rules['code'] .= ',' . $this->route()->parameter('category')->id;
            $rules['name'] .= ',' . $this->route()->parameter('category')->id;
            unset($rules['image']);
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute повинне бути заповненими',
            'code.required' => 'Поле код повинне бути заповненими'
        ];
    }
}
