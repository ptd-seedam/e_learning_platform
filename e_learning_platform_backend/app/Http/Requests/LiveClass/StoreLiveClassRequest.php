<?php

namespace App\Http\Requests\LiveClass;

use Illuminate\Foundation\Http\FormRequest;

class StoreLiveClassRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Title' => 'required|string|max:255',
            'Description' => 'nullable|string',
            'StartTime' => 'required|date|after:now',
            'EndTime' => 'required|date|after:StartTime',
            'MeetingLink' => 'required|url',
            'CourseId' => 'required|exists:courses,CourseId',
        ];
    }

    public function messages(): array
    {
        return [
            'Title.required' => 'Tiêu đề buổi học là bắt buộc.',
            'StartTime.required' => 'Thời gian bắt đầu là bắt buộc.',
            'StartTime.after' => 'Thời gian bắt đầu phải sau thời điểm hiện tại.',
            'EndTime.required' => 'Thời gian kết thúc là bắt buộc.',
            'EndTime.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu.',
            'MeetingLink.required' => 'Đường dẫn buổi học là bắt buộc.',
            'MeetingLink.url' => 'Đường dẫn buổi học không hợp lệ.',
            'CourseId.required' => 'Vui lòng chọn khóa học.',
            'CourseId.exists' => 'Khóa học không tồn tại.',
        ];
    }
}
