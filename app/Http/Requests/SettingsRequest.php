<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest  extends FormRequest
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
          'name_ar'  => 'required|max:255',
          'name_en'  => 'required|max:255',
          'address'  => 'required|max:255',
          'email'    => 'required|email',
          'phone'    => 'required',
          'mobile'    => 'required',
          'whatsapp_number'    => 'required',
          'link_facebook'      => 'required',
          'link_instagram'    => 'required',
          'privacy_policy_ar'    => 'required',
          'privacy_policy_en'    => 'required',
          'conditions_ar'    => 'required',
          'conditions_en'    => 'required',
        ];
    }

    public function messages() {
        return [
          'name_ar.required' => 'مطلوب أدخال أسم الموقع باللغة العربية',
          'name_ar.required' => 'مطلوب أدخال أسم الموقع باللغة الانجليزية',
          'address_ar.required' => 'مطلوب أدخال العنوان باللغة العربية',
          'address_en.required' => 'مطلوب أدخال العنوان باللغة الانجليزية',
          'email.required'   => 'يجب ادخال البريد الالكتروني ',
          'email.email'      => 'صيغة البريد الالكتروني غير صحيحة ',
          'phone.required'   => 'يجب ادخال رقم الجوال',
          'mobile.required'  => 'يجب ادخال رقم الهاتف',
          'commercial_registration_no.required'  => 'يجب ادخال  رقم السجل التجارى',
          'whatsapp_number.required'  => 'يجب ادخال  رقم اتصال الواتساب',
          'link_facebook.required'    => 'يجب ادخال لينك الفيس بوك',
          'privacy_policy_ar.required'   => 'يجب ادخال سياسيات الخصوصية باللغة العربية',
          'privacy_policy_en.required'   => 'يجب ادخال سياسيات الخصوصية باللغة الانجليزية',
          'conditions_ar.required'   => 'يجب ادخال الشروط و الاحكام باللغة العربية',
          'conditions_en.required'   => 'يجب ادخال الشروط و الاحكام باللغة الانجليزية',

        ];
    }
}
