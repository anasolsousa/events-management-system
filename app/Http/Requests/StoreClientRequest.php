<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'email' => 'required|email|unique:clients,email',
            'nif' => 'required|string|max:20'
        ];
    }

    public function messages() {
        return [
            'nome.max' => 'O campo aceita no máximo de 255 caracteres',
            'telefone.max' => 'O campo aceita no máximo de 20 caracteres',
            'email.unique' => 'Este email já está a ser utilizado noutra conta. Por favor escolha outro.',
            'nif.max' => 'O campo aceita no máximo de 20 caracteres'
        ]; 
     }
}
