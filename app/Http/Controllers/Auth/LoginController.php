<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            
           
                // return redirect()->back()->with('error', 'This account is inactive!');
                

            if(auth()->user()->hasRole(['superadministrator'])) {
                return redirect()->route('user.view');
            }

            if(auth()->user()->hasRole(['chat support'])) {
                // dd('testing asd');
                return redirect()->route('support.view');
            }
            
            if(auth()->user()->hasRole(['admin'])) {
                return redirect()->route('dashboard.view');

            } else {
                //USER
                return redirect()->intended('home/featured');
            }

            //Is active
            
            return redirect()->intended('home');
        }
        dd('test');

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}