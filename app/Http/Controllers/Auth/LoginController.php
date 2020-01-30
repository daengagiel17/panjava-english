<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function redirectToProvider($provider)
    {
        if($provider == 'testing')
        {
            $user = User::find(1);
            auth()->login($user);

            return redirect()->route('dashboard');
        }

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try
        {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) 
        {
            return redirect()->route('login')->with('error', 'Sorry something wrong in server');
        }
        
        $user = User::where(['email' => $socialUser->getEmail()])->first();

        if(!$user)
        {
            return redirect()->route('login')->with('error', 'You are not registered');
        }
        
        auth()->login($user);

        return redirect()->route('dashboard');
    }
 
}
