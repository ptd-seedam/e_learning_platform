<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'Price' => 'required|numeric|min:0',
            'ImageUrl' => 'nullable|url',
            'TeacherId' => 'required|exists:users,USER_ID',
            'Status' => 'required|string|max:50',
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
