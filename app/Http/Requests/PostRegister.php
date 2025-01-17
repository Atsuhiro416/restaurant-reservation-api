<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRegister extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '入力は必須です',
            'email.email' => 'メールアドレスを入力してください',
            'email.unique' => '登録済みのメールアドレスです',
            'password.required' => '入力は必須です',
            'password.min' => '6字以上入力してください'
        ];
    }
}
