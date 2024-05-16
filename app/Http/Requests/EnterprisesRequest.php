<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnterprisesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:enterprises,name']
        ];
    }
}
