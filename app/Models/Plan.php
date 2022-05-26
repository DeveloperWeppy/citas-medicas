<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'duration_in_days',
        'is_group',
        'status',
        'description',
        'cant_people',
    ];

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
}
