<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostLogin extends FormRequest
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
            'email' => 'required|exists:users',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '入力してください',
            'email.exists' => 'メールアドレスが間違っています',
        ];
    }
}
