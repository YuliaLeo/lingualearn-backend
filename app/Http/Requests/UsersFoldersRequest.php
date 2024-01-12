<?php

namespace App\Http\Requests;

class UsersFoldersRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'languageId' => 'required|integer',
        ];
    }
}
