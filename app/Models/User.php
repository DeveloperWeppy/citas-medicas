<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'logo', 'email', 'pw_decrypte', 'password', 'status', 'is_prestador',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //erlación de un usuario a una subscripcion
    public function subscription(){
        return $this->hasOne(Subscription::class);
    }

    /**como se llama una instancia de subscription, entonces se llama directamente la función de esa instancia
     QUÉ INFORMACIÓN SE CONDENSA CON ESTA FUNCIÓN?
     1. Si la relación entre el usuario y la subscripcion no existen, entonces retorna null, es aquí donde entra a operar el helper de optional, que si no devuelve
     un booleano sino null. Pero como se espera un booleano... se condiciona ?? que si lo anterior devuelve null, entonces cambie a falso
     
     2. Si subscription si existe, pero si quizas la subscripcion no esta activa, entonces retorna false
     3. Si si existe una subscripción, es decir que esta activa, se cumple la función por ende devuelve true**/
    public function hasActiveSubscription(){
        return optional($this->subscription)->isActive() ?? false;//esto retorna booleano
    }
}
