<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowProfileRequest extends FormRequest
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
            'nif' => 'required|string|max:255',
            'iban' => 'required|string|max:255',
            'salario' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'manager_id' => 'required|uuid|exists:managers,id'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'nome.max' => 'O nome não pode exceder 255 caracteres',

            'morada.required' => 'A morada é obrigatória',
            'morada.max' => 'A morada não pode exceder 255 caracteres',

            'nif.required' => 'O NIF é obrigatório',
            'nif.max' => 'O NIF não pode exceder 255 caracteres',

            'iban.required' => 'O IBAN é obrigatório',
            'iban.max' => 'O IBAN não pode exceder 255 caracteres',

            'salario.required' => 'O salário é obrigatório',
            'salario.max' => 'O salário não pode exceder 255 caracteres',

            'descricao.required' => 'A descrição é obrigatória',
            'descricao.max' => 'A descrição não pode exceder 255 caracteres',

            'manager_id.required' => 'O ID do manager é obrigatório',
            'manager_id.exists' => 'Manager não encontrado'
        ];
    }
}
