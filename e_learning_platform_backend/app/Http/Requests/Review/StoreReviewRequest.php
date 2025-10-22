<?php

namespace App\Http\Requests\Review;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Rating' => 'required|integer|min:1|max:5',
            'Comment' => 'nullable|string',
            'CourseId' => 'required|exists:courses,CourseId',
        ];
    }

    public function messages(): array
    {
        return [
            'Rating.required' => 'Vui lòng cho điểm đánh giá.',
            'Rating.integer' => 'Điểm đánh giá phải là số nguyên từ 1 đến 5.',
            'Rating.min' => 'Điểm đánh giá thấp nhất là 1 sao.',
            'Rating.max' => 'Điểm đánh giá cao nhất là 5 sao.',
            'CourseId.required' => 'Không tìm thấy khóa học để đánh giá.',
            'CourseId.exists' => 'Khóa học được chọn không tồn tại.',
        ];
    }
}
