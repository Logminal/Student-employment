<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'fio' => ['required'],
            'age' => ['required'],
            // 'enterprises_id' => ['required'],
            'specializations_id' => ['required'],
            'teachers_id' => ['required'],
        ];
    }
}
