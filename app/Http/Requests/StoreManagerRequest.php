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
    public function message()
    {
        return [
            'telefone.max' => 'O campo aceita no máximo de 20 caracteres',
            'nome.max' => 'O campo aceita no máximo de 255 caracteres',
            'email.unique' => 'Este email já está a ser utilizado noutra conta. Por favor escolha outro.',
        ];
    }
}
