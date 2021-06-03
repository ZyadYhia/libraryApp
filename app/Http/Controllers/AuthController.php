<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|uniqid:users,email|max:255',
            'password' => 'required|string|confirmed|min:5|max:30',
        ]);
        $user = User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), //uses Hash::make 
        ]);
        Auth::login($user);
        return redirect(url('cats'));
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string||min:5|max:30',
        ]);
        $isLogin = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if (!$isLogin) {
            $request->session()->flash('msg', 'Credentials not correct');
            return back();
        }
        $request->session()->flash('msg', 'Logged in successfuly');
        return redirect(url('/cats'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('cats'));
    }
}
