<?php

namespace App\Http\Requests\LessonMaterial;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonMaterialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'FileName' => 'required|string|max:255',
            'FileUrl' => 'required|url',
            'LessonId' => 'required|exists:lessons,LessonId',
        ];
    }

    public function messages(): array
    {
        return [
            'FileName.required' => 'Tên tệp tài liệu là bắt buộc.',
            'FileUrl.required' => 'Đường dẫn tệp không được để trống.',
            'FileUrl.url' => 'Đường dẫn tệp không hợp lệ.',
            'LessonId.required' => 'Vui lòng chọn bài học cho tài liệu này.',
            'LessonId.exists' => 'Bài học được chọn không tồn tại.',
        ];
    }
}
