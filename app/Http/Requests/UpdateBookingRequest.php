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
    public function messages()
    {
        return [
            'data_evento.required' => 'Por favor, insira a data do evento.',
            'data_evento.date' => 'Por favor, insira uma data válida.',
            'valor_total.required' => 'Por favor, insira o valor total.',
            'estado.required' => 'Por favor, insira o estado do evento.',
            'num_convidados.required' => 'Por favor, insira o número de convidados.',

            'descricao.required' => 'Por favor, insira a descrição.',
            'descricao.max' => 'A descrição não pode ter mais de 255 caracteres.',

            'local_id.required' => 'Escolha um local para o evento.',
            'local_id.exists' => 'O local selecionado não foi encontrado.',

            'catering_id.required' => 'Escolha um catering para o evento.',
            'catering_id.exists' => 'O catering selecionado não foi encontrado.',
    
        ];
    }
}
