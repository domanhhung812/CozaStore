<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestResetPassword extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required',
            'password_comfirm' => 'required|same:password',
        ];
    }
    public function message()
    {
        return [
            'password.required' => 'Password không được để trống',
            'password_confirm.required' => 'Password không được để trống',
            'password_confirm.same' => 'Password không chính xác',
        ];
    }
}
