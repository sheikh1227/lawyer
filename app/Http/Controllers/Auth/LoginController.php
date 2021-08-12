<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    public function login(\Illuminate\Http\Request $request) 
    { 
        $param = $request->all();
        
        $this->validateLogin($request);
       
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        // This section is the only change
        if ($this->guard()->validate($this->credentials($request))) 
        {
           
            $user = $this->guard()->getLastAttempted();
            
            if ($user->Status == 'Active' && $this->attemptLogin($request)) 
            {


                if ($user->role_id == 10)
                {   
                   
                    return redirect('/admin');

                }elseif ($user->role_id == 11){

                   
                    return redirect('/customer');

                }elseif ($user->role_id == 12){
                    
                    return redirect('/partner');

                }
                elseif ($user->role_id == 14){
                    
                    return redirect('/lawyer');

                }
                else{
                    return redirect()
                    ->back()
                    ->withInput($request->only($this->username(), 'remember'))
                    ->withErrors(['email' => 'You are not authorized to login here.']);

                }

            } 
            else 
            {
               
                // Increment the failed login attempts and redirect back to the
                // login form with an error message.
                $this->incrementLoginAttempts($request);
                return redirect()
                    ->back()
                    ->withInput($request->only($this->username(), 'remember'))
                    ->withErrors(['email' => 'You must be active to login.']);
            }

        }
         

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    // Login
    public function showLoginForm(){

    
        if (!empty(Auth::user()->role_id) && Auth::user()->role_id == 10){   
             die("admin1");
            return redirect('/admin');

        }elseif (!empty(Auth::user()->role_id) && Auth::user()->role_id == 11){

            die("customer1");
            return redirect('/customer');

        }elseif (!empty(Auth::user()->role_id) && Auth::user()->role_id == 12){
            die("partner1");
            return redirect('/partner');

        }
        elseif (!empty(Auth::user()->role_id) && Auth::user()->role_id == 14){
            die("lawyer1");
            return redirect('/lawyer');

        }
        else{
            
              $pageConfigs = [
                  'bodyClass' => "bg-full-screen-image",
                  'blankPage' => true
              ];

              return view('/auth/login', [
                  'pageConfigs' => $pageConfigs
              ]);
        }
     
    }



}
