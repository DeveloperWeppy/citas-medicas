<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembersClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'user_owner_id',
    ];


    public function cliente(){
        return $this->hasOne(Client::class);
    }

    public function cliente_propietario_subscripcion(){
        return $this->hasMany(User::class);
    }

    public function nombre_cliente()
    {
  
      //relación para poder mostrar el nombre de los intereses
      return $this->belongsTo(Client::class, 'client_id');
    }
}
