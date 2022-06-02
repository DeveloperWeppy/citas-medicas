<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeemedService extends Model
{
    use HasFactory;

    protected $fillable = [
        'prestador_id',
        'client_id',
        'service_id',
    ];

    public function prestador(){
        return $this->hasMany(UserInformation::class);
    }

    public function cliente(){
        return $this->hasMany(Client::class);
    }

    public function servicios(){
        return $this->hasMany(Service::class);
    }

    public function nombre_prestador_servicio()
    {
      return $this->belongsTo(UserInformation::class, 'prestador_id');
    }

    public function nombre_cliente()
    {
      return $this->belongsTo(Client::class, 'client_id');
    }

    public function nombre_servicio()
    {
      return $this->belongsTo(Service::class, 'service_id');
    }
}
