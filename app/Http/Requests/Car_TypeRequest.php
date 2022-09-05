<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Car_TypeRequest extends FormRequest
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
          'name_ar'  => 'required|max:255|unique:cars_type,name_ar,'.$this -> id,
          'name_en'  => 'required|max:255|unique:cars_type,name_en,'.$this -> id,
          'image'    => 'required|mimetypes:image/jpeg,image/png,image/gif',
        ];
    }

    public function messages() {
        return [
          'name_ar.required' => 'مطلوب أدخال أسم نوع السيارة باللغة العربية',
          'name_ar.unique'   => 'أسم نوع السيارة باللغة العربية مسجل لدينا من قبل',
          'name_en.required' => 'مطلوب أدخال أسم نوع السيارة باللغة الانجليزية',
          'name_en.unique'   => 'أسم نوع السيارة باللغة الانجليزية مسجل لدينا من قبل',
          'image.mimes'     => ' يجب اختيار صورة اخرى لان امتداد الصورة غير صالح ',
        ];
    }
}
