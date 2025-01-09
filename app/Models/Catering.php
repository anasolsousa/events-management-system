<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Booking;
use App\Models\Client;

class Catering extends Model
{
    use HasFactory;
    use HasUuids;
    
    protected $fillable = [
        'nome',
        'morada_sede',
        'telefone',
        'descricao',
        'preco_por_pessoa',
        'num_max_pessoas'
    ];

    public function booking(){
        return $this->hasMany(Booking::class);
    }
    public function client(){
        return $this->belongsToMany(Client::class, 'catering_id', 'client_id');
    }
}
