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
            'nome.max' => 'O campo aceita no máximo de 255 caracteres',
            'morada.max' => 'O campo aceita no máximo de 255 caracteres',
            'telefone.max' => 'O campo aceita no máximo de 20 caracteres',
        ]; 
     }
}
