<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interests extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
    ];

    public function categorias(){
        return $this->hasMany(CategoryService::class);
    }

    public function nombre_categoria()
    {
  
      //relación para poder mostrar el nombre de la categoria
      return $this->belongsTo(CategoryService::class, 'category_id');
    }
}
