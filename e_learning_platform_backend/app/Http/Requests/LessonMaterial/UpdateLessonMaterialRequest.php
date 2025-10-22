<?php

namespace App\Http\Requests\LessonMaterial;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonMaterialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'FileName' => 'sometimes|required|string|max:255',
            'FileUrl' => 'sometimes|required|url',
        ];
    }

    public function messages(): array
    {
        return [
            'FileName.required' => 'Tên tệp tài liệu là bắt buộc.',
            'FileUrl.required' => 'Đường dẫn tệp không được để trống.',
            'FileUrl.url' => 'Đường dẫn tệp không hợp lệ.',
        ];
    }
}
