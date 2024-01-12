<?php

namespace App\Http\Requests;

class CreateOrUpdateFolderRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'languageId' => 'required|integer',
        ];
    }
}
