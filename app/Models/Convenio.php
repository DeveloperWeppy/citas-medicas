<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'status',
        'responsable_id',
    ];

    public function responsable(){
        return $this->hasOne(UserInformation::class);
    }
    public function convenio(){
        return $this->belongsTo(UserInformation::class, 'responsable_id');
    }
}
