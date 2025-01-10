<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
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
            'descricao' => 'required|string|max:255',
            'local_id' => 'required|exists:locals,id',
            'catering_id' => 'required|exists:caterings,id',
        ];
    }
    public function message()
    {
        return [
            'descricao.max' => 'A descricao não pode execeder 255 caracteres.',
            'local_id.exists' => 'Local não encontrado',
            'catering_id.exists' => 'Catering não encontrado',
        ];
    }
}
