<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ApiModel;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


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

    use AuthenticatesUsers {login as loginAuthenticatesUsers;}

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

    public function login (Request $request)
    {

        $apiResponse = Http::asForm()->post(config('api.url').'login',[
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        $token = json_decode($apiResponse->body())->success->token;

        if (isset($token)) {

            Session::put('api_token',$token);

            Session::put('user_id', json_decode($apiResponse->body())->user_id);

            return redirect('home');
        }
        return redirect('login');
    }

    public function logout (Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect('login')->with('info', 'Vous êtes désormais déconnecté.');
    }
}
