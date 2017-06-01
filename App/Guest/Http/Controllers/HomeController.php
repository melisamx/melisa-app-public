<?php

namespace App\Guest\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
}
