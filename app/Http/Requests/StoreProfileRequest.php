<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'morada' => 'required|string|max:255',
            'nif' => 'required|string|max:255',  
            'iban' => 'required|string|max:255',
            'salario' => 'required|string|max:255'
        ];
    }
    public function messages()
    {
        return [
            'nome.required' => 'Por favor, insira o nome.',
            'nome.max' => 'O nome não pode ter mais de 255 caracteres.',

            'descricao.required' => 'Por favor, insira a descrição.',
            'descricao.max' => 'A descrição não pode ter mais de 255 caracteres.',

            'morada.required' => 'Por favor, insira a morada.',
            'morada.max' => 'A morada não pode ter mais de 255 caracteres.',

            'nif.required' => 'Por favor, insira o NIF.',
            'nif.max' => 'O NIF não pode ter mais de 255 caracteres.',

            'iban.required' => 'Por favor, insira o IBAN.',
            'iban.max' => 'O IBAN não pode ter mais de 255 caracteres.',

            'salario.required' => 'Por favor, insira o salário.',
            'salario.max' => 'O salário não pode ter mais de 255 caracteres.', 
        ];
    }
}
