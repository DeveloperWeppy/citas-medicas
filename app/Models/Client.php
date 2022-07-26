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
        'gender',
        'date_of_birth',
        'address',
        'neighborhood',
        'email',
        'num_phone',
        'city',
        'department',
        'is_owner',
        'whatsapp',
        'instagram',
        'facebook',
    ];

    public function usuario()
    {
      return $this->hasOne(User::class);
    }
}
