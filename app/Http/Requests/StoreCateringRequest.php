<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCateringRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'morada_sede' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'descricao' => 'required|string|max:255',
            'preco_por_pessoa' => 'required|numeric',
            'num_max_pessoas' => 'required|integer',
        ];
    }

    public function messages() 
    {
        return [
            'nome.required' => 'Por favor, insira o nome.',
            'nome.max' => 'O nome não pode ter mais de 255 caracteres.',

            'morada_sede.required' => 'Por favor, insira a morada da sede.',
            'morada_sede.max' => 'A morada da sede não pode ter mais de 255 caracteres.',

            'telefone.required' => 'Por favor, insira o número de telefone.',
            'telefone.max' => 'O número de telefone não pode ter mais de 20 caracteres.',

            'descricao.required' => 'Por favor, insira a descrição.',
            'descricao.max' => 'A descrição não pode ter mais de 255 caracteres.',

            'preco_por_pessoa.required' => 'Por favor, insira o preço por pessoa.',
            'preco_por_pessoa.numeric' => 'O preço por pessoa deve ser um valor numérico válido.',

            'num_max_pessoas.required' => 'Por favor, insira o número máximo de pessoas.',
            'num_max_pessoas.integer' => 'O número máximo de pessoas deve ser um número inteiro.',
        ]; 
     }
}
