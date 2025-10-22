<?php

namespace App\Http\Requests\Lesson;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Title' => 'sometimes|required|string|max:255',
            'VideoUri' => 'sometimes|required|url',
            'OrderIndex' => 'sometimes|required|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'Title.required' => 'Tiêu đề bài học là bắt buộc.',
            'VideoUri.required' => 'Đường dẫn video không được để trống.',
            'VideoUri.url' => 'Đường dẫn video không hợp lệ.',
            'OrderIndex.required' => 'Thứ tự bài học là bắt buộc.',
            'OrderIndex.integer' => 'Thứ tự bài học phải là số nguyên.',
        ];
    }
}
