<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    public function getLogin()
    {
         return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (auth('admin')->attempt(['email' => $request->input('email'),'password' => $request->input('password')])){

            return redirect()->route('dashboard');

        }else{

            return redirect()->back()->with([
                'message' => 'There is something wrong with the Data',
                'alert-type' => 'danger'

            ]);
        }
        }

        public function logout(){

        Auth::logout();
        return redirect()->route('getLogin');
    }





}
