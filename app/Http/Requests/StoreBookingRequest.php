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
            'data_evento.required' => 'Por favor, insira a data do evento.',
            'valor_total.required' => 'Por favor, insira o valor total.',
            'estado.required' => 'Por favor, insira o estado do evento.',
            'num_convidados.required' => 'Por favor, insira o número de convidados.',
            'descricao.required' => 'Por favor, insira uma descrição.',
        
            'client_id.required' => 'Escolha um cliente, este campo é obrigatório.',
            'client_id.exists' => 'O cliente fornecido não foi encontrado.',
        
            'manager_id.required' => 'Escolha um gestor, este campo é obrigatório.',
            'manager_id.exists' => 'O gestor fornecido não foi encontrado.',
        
            'local_id.required' => 'Escolha um local, este campo é obrigatório.',
            'local_id.exists' => 'O local fornecido não foi encontrado.',
        
            'catering_id.required' => 'Escolha um catering, este campo é obrigatório.',
            'catering_id.exists' => 'O catering fornecido não foi encontrado.',
        ];
    }
}
