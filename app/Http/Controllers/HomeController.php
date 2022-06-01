<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\UserInformation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('home');
    }

    public function inicio()
    {
        $id_user = auth()->id();
        $user = User::find($id_user);
        $name_client = '';

        $client = Client::where('user_id', $id_user)->first();
        $prestador = UserInformation::where('user_id', $id_user)->first();

        if ($user->hasRole('Prestador')) {
            $name_client = $prestador->name;
        }else if ($user->hasRole('Cliente')) {
            $name_client = $client->name;
        }
        
        
        return view('admin.home')->with('name_client', $name_client);
    }
}
