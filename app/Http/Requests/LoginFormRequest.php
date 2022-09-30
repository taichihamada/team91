<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
            'email' => 'required|email|max:254',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'メールアドレスを入力してください',
            'email.email'=>'正しいメールアドレスを入力してください',
            'password.required' => 'パスワードを入力してください'
        ];
    }
}
