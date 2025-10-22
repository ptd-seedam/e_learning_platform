<?php

namespace App\Http\Requests\Quiz;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuizRequest extends FormRequest
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
            'Duration' => 'required|integer|min:1',
            'PassScore' => 'required|numeric|min:0|max:100',
            'LessonId' => 'required|exists:lessons,LessonId',
        ];
    }

    public function messages(): array
    {
        return [
            'Title.required' => 'Tiêu đề bài kiểm tra là bắt buộc.',
            'Duration.required' => 'Thời gian làm bài là bắt buộc.',
            'Duration.integer' => 'Thời gian làm bài phải là số nguyên.',
            'PassScore.required' => 'Điểm đạt là bắt buộc.',
            'PassScore.numeric' => 'Điểm đạt phải là một số.',
            'LessonId.required' => 'Vui lòng chọn bài học cho bài kiểm tra này.',
            'LessonId.exists' => 'Bài học được chọn không tồn tại.',
        ];
    }
}
