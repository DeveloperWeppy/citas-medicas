<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //función que permite validar si el usuario está activo o inactivo
    protected function credentials(Request $request)
    {
        $request['status'] = 1;
        $ifSubs=false;
        $ifIncompleSubs=true;
        $data=$request->only($this->username(), 'password', 'status');
        if (Auth::attempt($data)) {
             $id = Auth::id();
             $verificar_subs = Subscription::where('user_id',  $id)->get();
             if(count($verificar_subs)>0){
                 $ifExisteSubs=false;
                 if ($verificar_subs[0]->next_payment >=now()->toDateString()) {
                   $ifSubs=true;
                 }
             }
        }
        session(['ifIncompleSubs' =>$ifIncompleSubs ]);
        session(['ifActiveSubs' =>$ifSubs ]);
        return $data;
    }
}
