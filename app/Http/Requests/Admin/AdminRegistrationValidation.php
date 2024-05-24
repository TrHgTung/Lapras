<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegistrationValidation extends FormRequest
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
            'name' => 'required|max:30|min:2|regex:/^[A-Z][a-zA-Z]*(?:\s[A-Z][a-zA-Z]*)*$/',
            'email' => 'required|max:50|min:5|regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/',
            'password' => 'required|max:50|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email là bắt buộc.',
            'email.max' => 'Email không được dài quá 50 kí tự.',
            'email.min' => 'Email không được ngắn hơn 5 kí tự.',
            'email.regex' => 'Email không cho phép kí tự đặc biệt.',
            'name.required' => 'Họ tên là bắt buộc.',
            'name.max' => 'Họ tên không được dài quá 30 kí tự.',
            'name.min' => 'Họ tên không được ngắn hơn 2 kí tự.',
            'name.regex' => 'Họ tên bắt buộc kí tự đầu phải in hoa, và có ít nhất 1 khoảng trắng.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.max' => 'Mật khẩu không được dài quá 50 kí tự.',
            'password.min' => 'Mật khẩu không được ngắn hơn 6 kí tự.',
        ];
        // Giải thích validation cho họ tên (name):

        // ^ và $: Bắt đầu và kết thúc của chuỗi.
        // [A-Z]: Chữ cái viết hoa đầu tiên của mỗi từ.
        // [a-zA-Z]*: Theo sau là các chữ cái thường hoặc chữ cái viết hoa.
        // (?:\s[A-Z][a-zA-Z]*)*: Cho phép có nhiều từ, mỗi từ bắt đầu bằng chữ cái viết hoa và theo sau là các chữ cái thường, cách nhau bởi khoảng trắng (\s).
    }
}
