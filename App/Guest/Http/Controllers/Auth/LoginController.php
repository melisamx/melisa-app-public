<?php

namespace App\Guest\Http\Controllers\Auth;

use Melisa\Laravel\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    use AuthenticatesUsers;

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
            /**
             * extract to http://stackoverflow.com/questions/2637896/php-regular-expression-for-strong-password-validation
             * 
             * ^                                        # start of line
                (?=(?:.*[A-Z]){2,})                      # 2 upper case letters
                (?=(?:.*[a-z]){2,})                      # 2 lower case letters
                (?=(?:.*\d){2,})                         # 2 digits
                (?=(?:.*[!@#$%^&*()\-_=+{};:,<.>]){2,})  # 2 special characters
                (.{8,})                                  # length 8 or more
                $                                        # EOL
             */
            /* is necesary use array */
            'password'=>[
                'required',
                'min:3',
                'max:30',
                'regex:/^(?=(?:.*[A-Z]){1,})(?=(?:.*[a-z]){1,})(?=(?:.*[a-z]){1,})(?=(?:.*\d){1,})(?=(?:.*[!@#$%&*()\-_=+{};:,]){1,})(.{3,})$/'
            ]
        ]);
    }
    
}
