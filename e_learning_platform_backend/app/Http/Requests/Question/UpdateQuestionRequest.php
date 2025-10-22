<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'QuestionText' => 'sometimes|required|string',
            'QuestionType' => 'sometimes|required|string|in:single_choice,multiple_choice',
        ];
    }

    public function messages(): array
    {
        return [
            'QuestionText.required' => 'Nội dung câu hỏi không được để trống.',
            'QuestionType.required' => 'Loại câu hỏi là bắt buộc.',
        ];
    }
}
