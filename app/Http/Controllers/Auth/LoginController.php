<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


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
    protected $redirectTo="/user";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function facebookRedirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function twitterRedirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function linkedInRedirectToProvider()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function facebookHandleProviderCallback()
    {
        $facebookUser = Socialite::driver('facebook')->stateless()->user();

        $user = User::where('email',$facebookUser->email)->first();
        if ($user){

            if (Auth::attempt(['email'=>$facebookUser->email, 'password' => 'temPassword'])){
                return redirect()->route('user.dashboard');
            }


        }else{

            $signUpUser = User::create([
                'full_name'             => $facebookUser->name,
                'email'                 => $facebookUser->email,
                'password'              => Hash::make('temPassword'),
                'is_confirmed'          => '1',
                'email_verify_token'    => Hash::make(date('dmYHis'))

            ]);

            if ($signUpUser){
                if (Auth::attempt(['email'=>$facebookUser->email, 'password' => 'temPassword'])){
                    return redirect()->route('user.dashboard');
                }
                return redirect()->route('user.dashboard');
            }
        }




    }

    public function linkedInHandleProviderCallback()
    {
        $linkedInUser = Socialite::driver('linkedin')->stateless()->user();

        $user = User::where('email',$linkedInUser->email)->first();


        if ($user){

           if (Auth::attempt(['email'=>$linkedInUser->email, 'password' => 'temPassword'])){
               return redirect()->route('user.dashboard');
           }


       }else{

           $signUpUser = User::create([
               'full_name'             => $linkedInUser->name,
               'email'                 => $linkedInUser->email,
               'password'              => Hash::make('temPassword'),
               'is_confirmed'          => '1',
               'email_verify_token'    => Hash::make(date('dmYHis'))

           ]);

           if ($signUpUser){
               return redirect()->route('user.dashboard');
           }
       }




    }

    public function twitterHandleProviderCallback()
    {
        $twitterUser = Socialite::driver('twitter')->user();
        dd($twitterUser);
/*
        $user = User::where('email',$twitterUser->email)->first();


        if ($user){

           if (Auth::attempt(['email'=>$twitterUser->email, 'password' => 'temPassword'])){
               return redirect()->route('home');
           }


       }else{

           $signUpUser = User::create([
               'full_name'             => $twitterUser->name,
               'email'                 => $twitterUser->email,
               'password'              => Hash::make('temPassword'),
               'is_confirmed'          => '1',
               'email_verify_token'    => Hash::make(date('dmYHis'))

           ]);

           if ($signUpUser){
               return redirect()->route('user.dashboard');return redirect()->route('user.dashboard');
           }
       }
*/



    }
}
