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
        'number_identication',
        'type_identication',
        'photo',
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
      return $this->hasOne(User::class);
    }
}
