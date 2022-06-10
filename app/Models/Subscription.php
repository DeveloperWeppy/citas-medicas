<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'active_until',
        'user_id',
        'plan_id'
    ];

    protected $dates = [
        'active_until',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function nombre_plan()
    {
  
      //relación para poder mostrar el nombre de la categoria
      return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function isActive(){
        //greater than = gt() mayor que
        return $this->active_until->gt(now());
    }
}
