<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'no_telp' => ['required',],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['no_telp' => $request->no_telp, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'no_telp' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerAction(Request $request)
    {
      $data= $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_telp' => ['required', 'string', 'min:11','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'no_telp' => $data['no_telp'],
            'password' => Hash::make($data['password']),
        ]);
        Auth::login($user); 
        return redirect()->route('registerPembayaran');
    }
    
   
}
