<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocalRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'morada' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'num_max_pessoas' => 'required|integer'
        ];
    }

    public function messages() {
        return [
            'nome.required' => 'Por favor, insira o nome.',
            'nome.max' => 'O nome não pode ter mais de 255 caracteres.',

            'morada.required' => 'Por favor, insira a morada.',
            'morada.max' => 'A morada não pode ter mais de 255 caracteres.',

            'telefone.required' => 'Por favor, insira o número de telefone.',
            'telefone.max' => 'O número de telefone não pode ter mais de 20 caracteres.',

            'num_max_pessoas.required' => 'Por favor, insira o número máximo de pessoas.',
        ]; 
     }
}
