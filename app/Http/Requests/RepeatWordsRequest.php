<?php

namespace App\Http\Requests;

class RepeatWordsRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'count' => 'required|integer|min:1|max:100',
        ];
    }
}
