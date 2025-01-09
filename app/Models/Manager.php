<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Booking;
use App\Models\profile_managers;

class Manager extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'nome',
        'telefone',
        'email'
    ];

    public function booking() {
        return $this->hasMany(Booking::class);
    }
    // um manager tem um perfil 
    public function profile_manager(){
        return $this->hasOne(profile_manager::class);
    }
}
