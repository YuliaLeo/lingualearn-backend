<?php

namespace App\Http\Requests;

class CreateOrUpdateWordRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'word' => 'required|string',
            'translation' => 'required|string',
            'folder_id' => 'required|integer',
        ];
    }
}
