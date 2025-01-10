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
            'nome.max' => 'O campo aceita no máximo de 255 caracteres',
            'morada_sede.max' => 'A Morada não pode execeder 255 caracteres.',
            'descricao.max' => 'A descricao não pode execeder 255 caracteres.',
            'telefone.max' => 'O campo aceita no máximo de 20 caracteres'
        ]; 
     }
}
