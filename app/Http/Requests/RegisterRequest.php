<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "O campo nome é obrigatório.",
            "email.required" => "O campo email é obrigatório.",
            "password.required" => "O campo senha é obrigatório.",
            "email.unique" => "O email fornecido já está em uso.",
        ];
    }
}
