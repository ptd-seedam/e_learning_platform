<?php

namespace App\Http\Requests\Quiz;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuizRequest extends FormRequest
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
            'Duration' => 'sometimes|required|integer|min:1',
            'PassScore' => 'sometimes|required|numeric|min:0|max:100',
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
        ];
    }
}
