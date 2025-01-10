<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'data_evento' => 'required|date',
            'valor_total' => 'required|numeric',
            'estado' => 'required|string',
            'num_convidados' => 'required|integer',
            'descricao' => 'required|string',
            'client_id' => 'required|uuid|exists:clients,id',
            'manager_id' => 'required|uuid|exists:managers,id',
            'local_id' => 'required|uuid|exists:locals,id',
            'catering_id' => 'required|uuid|exists:caterings,id',
        ];
    }

    public function messages()
    {
        return [
            'descricao.max' => 'A descricao não pode execeder 255 caracteres.',
            'client_id.exists' => 'Cliente não encontrado',
            'manager_id.exists' => 'Manager não encontrado',
            'local_id.exists' => 'Local não encontrado',
        ];
    }
}
