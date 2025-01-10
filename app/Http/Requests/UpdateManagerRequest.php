<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateManagerRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:managers,email',
            'telefone' => 'required|string|max:20',
        ];
    }
    public function message()
    {
        return[
            'email.unique' => 'Este email já está a ser utilizado noutra conta. Por favor escolha outro.',
            'telefone.max' => 'O campo aceita no máximo de 20 caracteres',
        ];
    }
}
