<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Booking;

class Local extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'nome',
        'morada',
        'telefone',
        'num_max_pessoas',
    ];

    // booking pertence ao client 
    public function booking() {
        return $this->hasMany(Booking::class);
    }
}
