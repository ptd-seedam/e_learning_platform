<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Cho phép bất kỳ ai cũng có thể gửi yêu cầu đăng ký
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
            'FULLNAME' => 'required|string|max:255',
            'EMAIL' => 'required|email|unique:users,EMAIL',
            'PASSWORD' => ['required', 'confirmed', Password::min(8)],
        ];
    }

    public function messages(): array
    {
        return [
            'FULLNAME.required' => 'Vui lòng nhập họ tên.',
            'EMAIL.required' => 'Email không được để trống.',
            'EMAIL.email' => 'Email không hợp lệ.',
            'EMAIL.unique' => 'Email này đã được đăng ký.',
            'PASSWORD.required' => 'Mật khẩu không được để trống.',
            'PASSWORD.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ];
    }
}
