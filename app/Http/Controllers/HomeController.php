<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\UserInformation;
use Illuminate\Http\Request;

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

        $client = Client::where('user_id', $id_user)->first();
        $prestador = UserInformation::where('user_id', $id_user)->first();
        
        $name_client = $client->name;
        return view('admin.home')->with('name_client', $name_client);
    }
}
