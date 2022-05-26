<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'name',
        'last_name',
        'age',
        'date_of_birth',
        'address',
        'neighborhood',
        'email',
        'num_phone',
        'city',
        'department',
        'whatsapp',
        'instagram',
        'facebook',
    ];

    public function usuario()
    {
      //con esto hago la relación de por cada capital establecido pertenece a un cuadre de caja, es decir a un capital en efectivo diario
      return $this->hasOne(User::class);
    }
}
