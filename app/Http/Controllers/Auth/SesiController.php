<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SesiController extends Controller
{
    public function regis()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::login($user);

        return redirect('/')->with('succes','register successfully');
    }

    public function index()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
        ],[
            'email.required'=>'Email Wajib Diisi',
            'password.required'=>'Password Wajib Diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            $request->session()->regenerate();
            return redirect('/');
        }else{
            return redirect('/login')->withErrors('Email dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
  
        $request->session()->regenerateToken();
  
        return redirect('/');
    }
}
