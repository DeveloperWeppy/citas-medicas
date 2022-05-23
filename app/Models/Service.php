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
        'start_date',
        'end_date',
        'redeemed_available',
        'observation',
        'status',
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
}
