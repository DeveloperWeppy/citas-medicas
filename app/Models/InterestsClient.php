<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestsClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'interest_id',
        'client_id',
    ];

    public function intereses(){
        return $this->hasMany(Interests::class);
    }

    public function clientes(){
        return $this->hasMany(Client::class);
    }

    public function nombre_interes()
    {
  
      //relación para poder mostrar el nombre de los intereses
      return $this->belongsTo(Interests::class, 'interest_id');
    }
}
