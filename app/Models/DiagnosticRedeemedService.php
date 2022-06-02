<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticRedeemedService extends Model
{
    use HasFactory;

    protected $fillable = [
        'redeemed_service_id',
        'code',
        'description',
    ];

    public function servicioredimido(){
        return $this->hasMany(RedeemedService::class);
    }
}
