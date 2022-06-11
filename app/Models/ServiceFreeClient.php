<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFreeClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad_veces_redimir',
        'id_cliente',
        'id_service_free',
    ];

    public function client(){
        return $this->hasMany(Client::class);
    }

    public function servicefree(){
        return $this->hasMany(Service::class);
    }
}
