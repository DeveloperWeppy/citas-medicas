<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price_normal',
        'price_discount',
        'percentage_discount',
        'start_date',
        'end_date',
        'observation',
        'status',
        'is_free',
        'category_id',
        'specialty_id',
    ];

    public function category(){
        return $this->hasMany(CategoryService::class);
    }

    public function convenio(){
        return $this->hasMany(Convenio::class);
    }

    public function speciality(){
        return $this->hasMany(Specialty::class);
    }

    public function nombre_categoria()
    {
  
      //relación para poder mostrar el nombre de la categoria
      return $this->belongsTo(CategoryService::class, 'category_id');
    }

    public function nombre_especialidad()
    {
  
      //relación para poder mostrar el nombre de la categoria
      return $this->belongsTo(Specialty::class, 'specialty_id ');
    }
}
