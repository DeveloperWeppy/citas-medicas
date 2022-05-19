<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttentioShedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'open_morning',
        'close_morning',
        'open_afternoon',
        'close_afternoon',
        'responsable_id',
    ];

    public function user_prestador(){

        return $this->hasMany(UserInformation::class);
    }
}
