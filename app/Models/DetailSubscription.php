<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'suscription_id',
        'operation_id',
        'payer_id',
        'status_operation',
        'next_payment_date',
        'payment_method_id',
        'payer_first_name',
        'payer_last_name',
        'preapproval_plan_id',
    ];

    public function user_cliente(){
        return $this->hasMany(User::class);
    }

    public function subscription(){
        return $this->hasMany(Subscription::class);
    }
}
