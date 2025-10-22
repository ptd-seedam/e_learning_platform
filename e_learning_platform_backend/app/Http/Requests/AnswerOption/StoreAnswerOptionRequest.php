<?php

namespace App\Http\Requests\AnswerOption;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnswerOptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'OptionText' => 'required|string|max:255',
            'IsCorrect' => 'required|boolean',
            'QuestionId' => 'required|exists:questions,QuestionId',
        ];
    }
    public function messages()
    {
        return [
            // Validation messages for OptionText
            'OptionText.required' => 'Nội dung câu trả lời không được để trống.',
            'OptionText.string'   => 'Nội dung câu trả lời phải là một chuỗi ký tự.',
            'OptionText.max'      => 'Nội dung câu trả lời không được vượt quá 255 ký tự.',

            // Validation messages for IsCorrect
            'IsCorrect.required' => 'Vui lòng cho biết đây có phải là đáp án đúng không.',
            'IsCorrect.boolean'  => 'Trường xác định đáp án đúng phải là true hoặc false.',

            // Validation messages for QuestionId
            'QuestionId.required' => 'Vui lòng chọn câu hỏi cho đáp án này.',
            'QuestionId.exists'   => 'Câu hỏi được chọn không tồn tại trong hệ thống.',
        ];
    }
}
