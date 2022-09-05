<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
          'user_name' => 'required|max:255',
          'email'     => 'required|email',
          'phone'     => 'required',
          'message'   => 'required|max:255',
        ];
    }

    public function messages() {
        return [
          'user_name.required' => 'مطلوب ادخال الاسم',
          'email.required'     => 'مطلوب ادخال البريدالالكترونى',
          'phone.required'     =>  'مطلوب ادخال رقم الجوال',
          'message.required'   =>  'مطلوب ادخال محتوى الرسالة',
            ];
    }
}
