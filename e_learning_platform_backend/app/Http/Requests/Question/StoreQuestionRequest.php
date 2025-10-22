<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'QuestionText' => 'required|string',
            'QuestionType' => 'required|string|in:single_choice,multiple_choice',
            'QuizID' => 'required|exists:quizzes,QuizID',
            'options' => 'required|array|min:2',
            'options.*.OptionText' => 'required|string',
            'options.*.IsCorrect' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'QuestionText.required' => 'Nội dung câu hỏi không được để trống.',
            'QuestionType.required' => 'Loại câu hỏi là bắt buộc.',
            'QuizID.required' => 'Vui lòng chọn bài kiểm tra cho câu hỏi.',
            'QuizID.exists' => 'Bài kiểm tra không tồn tại.',
            'options.required' => 'Câu hỏi phải có các lựa chọn trả lời.',
            'options.min' => 'Câu hỏi phải có ít nhất 2 lựa chọn.',
            'options.*.OptionText.required' => 'Nội dung lựa chọn không được để trống.',
            'options.*.IsCorrect.required' => 'Phải xác định lựa chọn đúng/sai.',
        ];
    }
}
