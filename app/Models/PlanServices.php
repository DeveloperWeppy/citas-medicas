<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'service_id',
    ];

    public function plan(){
        return $this->hasMany(Plan::class);
    }

    public function servicios(){
        return $this->hasMany(Service::class);
    }
}
