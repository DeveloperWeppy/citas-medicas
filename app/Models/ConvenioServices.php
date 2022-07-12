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
        'price_normal',
        'price_discount',
        'percentage_discount',
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

    public function nombre_convenios()
    {
      //relación para poder mostrar el nombre de la categoria
      return $this->belongsTo(Convenio::class, 'convenio_id');
    }
   
    public function resposable()
    {
      return $this->hasManyThrough('App\Models\UserInformation', 'App\Models\Convenio');

    }
}
