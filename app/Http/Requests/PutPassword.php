<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PutPassword extends FormRequest
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
            'email' => 'required|email|',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '入力は必須です',
            'email.email' => 'メールアドレスを入力してください',
            'password.required' => '入力は必須です',
            'password.min' => '6字以上入力してください'
        ];
    }
}
