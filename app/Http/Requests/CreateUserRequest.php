<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;

class CreateUserRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'userName' => 'required',
            'email' => 'required',
            'password' => 'required',
            'language_id' => 'required',
            'level_id' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if (count($validator->failed()) > 0) {
            $validator->errors()->add('_form', $this->formValidationMessage());
        }

        parent::failedValidation($validator);
    }

    protected function formValidationMessage(): string
    {
        return  'Request data is invalid';
    }
}
