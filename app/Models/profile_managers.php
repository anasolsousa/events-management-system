<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Manager;

class profile_managers extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'nome',
        'morada',
        'nif',
        'iban',
        'salario',
        'descricao',
        'manager_id',
    ];

    //  um perfil pertence a um manager
    public function manager(){
        return $this->belongsTo(Manager::class);
    }
}
