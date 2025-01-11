<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:clients,email,' . $this->client,
            'telefone' => 'required|string|max:20'
        ];
    }
    
    public function messages()
    {
        return [
           'email.required' => 'Por favor, insira o e-mail.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'email.unique' => 'O e-mail fornecido já está em uso. Por favor, use outro e-mail.',

            'telefone.required' => 'Por favor, insira o número de telefone.',
            'telefone.max' => 'O número de telefone não pode ter mais de 20 caracteres. Por favor, ajuste o número de telefone.',
        ];
    }
}
