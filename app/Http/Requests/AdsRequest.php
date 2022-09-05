<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsRequest extends FormRequest
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
          'name_ar'         => 'required|max:255|unique:ads,name_ar,'.$this -> id,
          'name_en'         => 'required|max:255|unique:ads,name_en,'.$this -> id,
          'car_type_id'     => 'required'.$this -> id,
          'car_model'       => 'required'.$this -> id,
          'piece_number'    => 'required'.$this -> id,
          'price'           => 'required'.$this -> id,
          'ads_type'        => 'required'.$this -> id,
          'description_ar'  => 'required'.$this -> id,
          'description_en'  => 'required'.$this -> id,
        ];
    }

    public function messages() {
        return [
          'name_ar.required' => 'مطلوب أدخال أسم القطعة باللغه العربية',
          'name_ar.unique'   => 'أسم القطعة باللغة العربية مسجل لدينا من قبل',
          'name_en.required' => 'مطلوب أدخال أسم القطعة باللغه الانجليزية',
          'name_en.unique'   => 'أسم القطعة باللغة الانجليزية مسجل لدينا من قبل',
          'car_type_id.required'    => 'مطلوب اختيار نوع السيارة',
          'car_model.required'      => 'مطلوب اختيار موديل السيارة',
          'piece_number.required'   => 'مطلوب أدخال رقم القطعة',
          'price.required'          => 'مطلوب تحديد سعر القطعة',
          'ads_type.required'       => 'مطلوب تحديد نوع القطعة',
          'description_ar.required'       => 'مطلوب ادخال وصف القطعة باللغة العربية',
          'description_en.required'       => 'مطلوب ادخال وصف القطعة باللغة الانجليزية',
        ];
    }
}
