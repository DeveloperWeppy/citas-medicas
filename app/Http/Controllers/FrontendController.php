<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function nosotros()
    {
       
        return view('nosotros');
    }

    public function servicios()
    {
       
        return view('servicios');
    }

    public function afiliate()
    {
       
        return view('afiliate');
    }

    public function contacto()
    {
       
        return view('contacto');
    }

    public function subscribirme()
    {
       
        return view('subscribirme');
    }
}
