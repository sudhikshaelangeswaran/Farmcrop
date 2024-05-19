<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function register()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'type' => $request->type
        ]);

        return redirect()->route('welcome');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            if (auth()->user()->type == 'Admin') {
                return redirect()->route('Admin.dashboard');
            }else if (auth()->user()->type == 'customer') {
                return redirect()->route('customer.dashboard');
            }
            else if (auth()->user()->type == 'farmer'){
                return redirect()->route('farmer.dashboard');
            }
            else
            {
                return redirect()->route('login')->withErrors('error','provided credentials are wrong');
            }
        }

        return redirect('login')->with('error', 'Invalid credentials');
    }
    public function logout(Request $request)
    {
        //predefined laravel function for logging out
        Auth::logout();
        //removing the validation of the user when they logout
        $request->session()->invalidate();
        //remove the session and regenerating new token
        $request->session()->regenerateToken();
        //redirecting then to the login page with success mesaage
        return redirect()->route('login')->withSuccess('Logged out !');
    }
}

