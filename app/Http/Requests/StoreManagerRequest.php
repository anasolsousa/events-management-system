<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreManagerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|unique:managers,email'
        ];
    }
    public function messages()
    {
        return [
            'nome.required' => 'Por favor, insira o nome.',
            'nome.max' => 'O nome não pode ter mais de 255 caracteres.',

            'telefone.required' => 'Por favor, insira o número de telefone.',
            'telefone.max' => 'O número de telefone não pode ter mais de 20 caracteres.',

            'email.required' => 'Por favor, insira o e-mail.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'email.unique' => 'O e-mail fornecido já está em uso. Por favor, use outro e-mail.',
        ];
    }
}
