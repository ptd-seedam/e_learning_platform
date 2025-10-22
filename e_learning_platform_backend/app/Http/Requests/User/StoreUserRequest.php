<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Thay đổi logic phân quyền ở đây nếu cần
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'USERNAME' => 'required|string|max:255|unique:users,USERNAME',
            'PASSWORD' => ['required', 'confirmed', Password::defaults()],
            'FULLNAME' => 'required|string|max:255',
            'EMAIL' => 'required|email|max:255|unique:users,EMAIL',
            'ADDRESS' => 'nullable|string|max:255',
            'PHONENUMBER' => 'nullable|string|max:20',
            'ROLE' => 'required|string|in:Học viên,Giáo viên,Quản trị viên', // Ví dụ các vai trò
        ];
    }
}
