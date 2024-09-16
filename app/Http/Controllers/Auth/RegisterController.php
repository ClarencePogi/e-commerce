<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'phonenumber' => ['required', 'regex:/^(09|\+639)[0-9]{9,9}$/'],
            'email' => ['required', 'string', 'email','max:255','unique:users,email'],
            'eWalletNumber' => 'required|regex:/^\d{6,6}$/|unique:users',
            'address' => 'required|string|max:100',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->name,
            'phonenumber' => $request->phonenumber,
            'email' => $request->email,
            'eWalletNumber' => $request->eWalletNumber,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        
        Auth::login($user);

        $user->attachRole('user');

        return response()->json(['status' => true]);
    }
}
