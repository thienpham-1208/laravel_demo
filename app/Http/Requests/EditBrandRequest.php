<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditBrandRequest extends FormRequest
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
        return [
            'name'=>'unique:brand_products,name,'.$this->id,
        ];
    }
    public function messages(){
        return [
            'name.unique'=> "Nhãn hàng đã tồn tại. Mời nhập lại."
        ];
    }
}
