<?php

namespace App\Http\Requests;

class UpdateRepetitionTimeRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'wordId' => 'required|integer',
            'isCorrect' => 'required|boolean',
            'shownAt' => 'required|date',
        ];
    }
}
