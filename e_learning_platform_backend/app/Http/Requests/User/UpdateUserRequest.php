<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('user')->USER_ID; // Lấy ID của user từ route

        return [
            'USERNAME' => 'required|string|max:255|unique:users,USERNAME,' . $userId . ',USER_ID',
            'PASSWORD' => ['nullable', 'confirmed', Password::defaults()], // Mật khẩu không bắt buộc khi cập nhật
            'FULLNAME' => 'required|string|max:255',
            'EMAIL' => 'required|email|max:255|unique:users,EMAIL,' . $userId . ',USER_ID',
            'ADDRESS' => 'nullable|string|max:255',
            'PHONENUMBER' => 'nullable|string|max:20',
            'ROLE' => 'required|string|in:Học viên,Giáo viên,Quản trị viên',
        ];
    }
}
