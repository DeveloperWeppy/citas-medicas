<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumbersMembersAvailable extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'registered_members'
    ];

    public function miembros_disponibles_usuario_propietario(){
        return $this->hasMany(Client::class);
    }
}
