<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'nit',
        'name',
        'address',
        'num_phone',
        'name_contact',
        'num_phone_contact',
        'email_contact',
        'city',
    ];

    public function usuario()
    {
      //con esto hago la relación de por cada capital establecido pertenece a un cuadre de caja, es decir a un capital en efectivo diario
      return $this->hasOne(User::class);
    }
}
