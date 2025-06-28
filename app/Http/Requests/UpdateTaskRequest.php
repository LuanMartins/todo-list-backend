<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends CreateTaskRequest
{
    public function rules(): array
    {
        $rules = parent::rules();
        $rules['completed'] = ['required', 'boolean'];
        

        return $rules;
    }
}
