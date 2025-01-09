<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Booking;
use App\Models\Catering;

class Client extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'nif'
    ];

    // um cliente tem varios bookings
    public function booking() {
        return $this->hasMany(Booking::class);
    }

    public function catering(){
        return $this->belongsToMany(Catering::class, 'client_catering', 'client_id', 'catering_id');
    }
}
