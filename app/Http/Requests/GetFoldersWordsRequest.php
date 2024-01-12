<?php

namespace App\Http\Requests;

class GetFoldersWordsRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'folderId' => 'required|exists:folders,id'
        ];
    }
}
