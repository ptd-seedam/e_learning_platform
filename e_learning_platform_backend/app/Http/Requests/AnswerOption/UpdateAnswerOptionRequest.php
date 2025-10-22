<?php

namespace App\Http\Requests\AnswerOption;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnswerOptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'OptionText' => 'sometimes|required|string|max:255',
            'IsCorrect' => 'sometimes|required|boolean',
        ];
    }
}
