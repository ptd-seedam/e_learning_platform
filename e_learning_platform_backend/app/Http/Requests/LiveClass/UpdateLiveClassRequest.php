<?php

namespace App\Http\Requests\LiveClass;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLiveClassRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Title' => 'sometimes|required|string|max:255',
            'Description' => 'nullable|string',
            'StartTime' => 'sometimes|required|date',
            'EndTime' => 'sometimes|required|date|after:StartTime',
            'MeetingLink' => 'sometimes|required|url',
        ];
    }

    public function messages(): array
    {
        return [
            'Title.required' => 'Tiêu đề buổi học là bắt buộc.',
            'StartTime.required' => 'Thời gian bắt đầu là bắt buộc.',
            'EndTime.required' => 'Thời gian kết thúc là bắt buộc.',
            'EndTime.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu.',
            'MeetingLink.required' => 'Đường dẫn buổi học là bắt buộc.',
            'MeetingLink.url' => 'Đường dẫn buổi học không hợp lệ.',
        ];
    }
}
