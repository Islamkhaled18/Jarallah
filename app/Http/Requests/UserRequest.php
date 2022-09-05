<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
           'username'              => 'required|unique:users',
           'email'              => 'required|email|max:255|unique:users',
           'phone'              => 'required|unique:users',
           'password'           => 'required|min:6',
         ];
     }

     public function messages() {
         return [
           'username.required'  => 'مطلوب ادخال اسم المستخدم',
           'email.required'       => ' مطلوب ادخال البريد الإلكتروني ',
           'email.unique'         => ' البريد الالكترونى موجود لدينا من قبل',
           'phone.required'       => ' برجاء ادخال رقم الهاتف لسهولة ',
           'phone.unique'         => ' رقم الهاتف مسجل لدينا من قبل',
           'password.required'    => ' مطلوب ادخال كلمة المرور ',
           'password.min'         => 'كلمة المرور لا تقل عن 6 أرقام',
             ];
     }
}
