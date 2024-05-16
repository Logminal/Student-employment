<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    public function rules(): array
    {
        // return [
        //     'name' => ['required'],
        //     'password' => ['required'],
        //     'surname' => ['required'],
        //     'patronymic' => ['required'],
        //     'login' => ['required', 'unique:users,login']
        // ];
        return [
            'fio' => ['required'],
            'login' => ['required', 'unique:users,login'],
            // 'status' => ['required'],
            'password' => ['required'],
        ];
    }
}
