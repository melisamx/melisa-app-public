<?php

namespace App\Guest\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Melisa\Laravel\Http\Controllers\Controller;
use App\Security\Http\Controllers\Auth\PasswordPolice;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
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

    use AuthenticatesUsers, PasswordPolice;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/panel.php/#init';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {   
        if( melisa('userAgent')->isMobile()) {            
            return view('auth.login', [
                'mobile'=>'/js/app-mobile.js'
            ]);            
        }        
        return view('auth.login');        
    }
    
    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|email|min:5|max:90',
            'password'=>$this->passwordValidation
        ]);
    }
    
}
