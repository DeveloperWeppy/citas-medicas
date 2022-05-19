<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesFree extends Model
{
    use HasFactory;

    protected $fillable = [
        'duration_in_days',
        'service_id',
    ];

    public function service(){
        return $this->hasMany(Service::class);
    }
}
