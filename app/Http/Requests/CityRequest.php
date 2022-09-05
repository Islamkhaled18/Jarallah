<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
    public function rules() {
        return [
          'name_ar'  => 'required|max:255|unique:citys,name_ar,'.$this -> id,
        ];
    }

    public function messages() {
        return [
          'name_ar.required' => 'مطلوب أدخال أسم المدينة باللغه العربية',
          'name_ar.unique'   => 'أسم المدينة باللغة العربية مسجل لدينا من قبل',
        ];
    }
}
