<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:30|min:2',
            'email' => 'required|max:50|min:5',
            'password' => 'required|max:50|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email là bắt buộc.',
            'email.max' => 'Email không được dài quá 50 kí tự.',
            'email.min' => 'Email không được ngắn hơn 5 kí tự.',
            'name.required' => 'Họ tên là bắt buộc.',
            'name.max' => 'Họ tên không được dài quá 30 kí tự.',
            'name.min' => 'Họ tên không được ngắn hơn 2 kí tự.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.max' => 'Mật khẩu không được dài quá 50 kí tự.',
            'password.min' => 'Mật khẩu không được ngắn hơn 6 kí tự.',
        ];
    }
}
