<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvenioServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'convenio_id',
        'service_id',
    ];

    public function convenio(){
        return $this->hasMany(Convenio::class);
    }

    public function servicios(){
        return $this->hasMany(Service::class);
    }

    public function nombre_servicios()
    {
      //relación para poder mostrar el nombre de la categoria
      return $this->belongsTo(Service::class, 'service_id');
    }
}
