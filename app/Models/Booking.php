<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Client;
use App\Models\Manager;
use App\Models\Local;
use App\Models\Catering;

class Booking extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'data_evento',
        'valor_total',
        'estado',
        'num_convidados',
        'descricao',
        'client_id',  
        'manager_id', 
        'local_id',  
        'catering_id'
    ];

    // booking pertence ao client 
    public function client() {
        return $this->belongsTo(Client::class);
    }

    // booking pertence ao manager
    public function manager() {
        return $this->belongsTo(Manager::class);
    }

    public function local(){
        return $this->belongsTo(Local::class);
    }

    public function catering(){
        return $this->belongsTo(Catering::class);
    }

}
