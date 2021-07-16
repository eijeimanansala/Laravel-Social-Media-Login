<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

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

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Find User
        $authUser = User::where('email', $user->email)->first();
        if($authUser){
            Auth::login($authUser);
            return redirect()->route('category');
        }
        else{
            $newUser = new User();
            $newUser->email = $user->email;
            $newUser->name = $user->name;
            $newUser->email_verified_at = Date::now();
            $newUser->userid = $user->id;
            $newUser->avatar = $user->avatar;
            $newUser->save();

            // Login
            Auth::login($newUser);
            return redirect()->route('category');
        }
        
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // Find User
        $authUser = User::where('email', $user->email)->first();
        if($authUser){
            Auth::login($authUser);
            return redirect()->route('category');
        }
        else{
            $newUser = new User();
            $newUser->email = $user->email;
            $newUser->name = $user->name;
            $newUser->email_verified_at = Date::now();
            $newUser->userid = $user->id;
            $newUser->avatar = $user->avatar;
            $newUser->save();

            // Login
            Auth::login($newUser);
            return redirect()->route('category');
        }
        
    }

}
