<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class About_UsRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
          'aboutus_ar'              => 'required'.$this -> id,
          'aboutus_en'              => 'required'.$this -> id,
        ];
    }

    public function messages() {
        return [
          'aboutus_ar.required'    => 'هذا الحقل مطلوب',
          'aboutus_en.required'    => 'هذا الحقل مطلوب',
        
        ];
    }
}
