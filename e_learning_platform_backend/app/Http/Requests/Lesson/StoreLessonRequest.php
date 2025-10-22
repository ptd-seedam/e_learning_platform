<?php

namespace App\Http\Requests\Lesson;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Title' => 'required|string|max:255',
            'VideoUri' => 'required|url',
            'OrderIndex' => 'required|integer|min:1',
            'CourseId' => 'required|exists:courses,CourseId',
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
            'CourseId.required' => 'Vui lòng chọn khóa học cho bài học này.',
            'CourseId.exists' => 'Khóa học được chọn không tồn tại.',
        ];
    }
}
