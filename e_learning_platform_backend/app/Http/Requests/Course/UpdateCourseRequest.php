<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'Price' => 'sometimes|required|numeric|min:0',
            'ImageUrl' => 'nullable|url',
            'TeacherId' => 'sometimes|required|exists:users,USER_ID',
            'Status' => 'sometimes|required|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'Title.required' => 'Tiêu đề khóa học không được để trống.',
            'Price.required' => 'Giá khóa học không được để trống.',
            'Price.numeric' => 'Giá khóa học phải là một số.',
            'TeacherId.required' => 'Vui lòng chọn giáo viên.',
            'TeacherId.exists' => 'Giáo viên được chọn không tồn tại.',
            'Status.required' => 'Trạng thái khóa học không được để trống.',
        ];
    }
}
