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
    public function message()
    {
        return [
            'descricao.max' => 'A descrição não pode exceder 255 caracteres.',
            'nome.max' => 'O campo nome tem no máximo 255 caracteres.',
            'nif.max' => 'O campo NIF não pode exceder 255 caracteres.',  
        ];
    }
}
