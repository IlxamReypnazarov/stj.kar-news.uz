<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function home(){
        return view('home');
    }

    public function dashboard()
    {
        $user_status = Auth::user()->status;
        if($user_status == "student"){
            return view('student.home');
        }elseif($user_status == "admin"){
            return view('admin.home');
        }
    }


    public function loginView()
    {
        return view('login');
    }

    public function registerView()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'last_name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();

        return redirect()->route('dashboard')
            ->withSuccess('You have successfully registered & logged in!');
    }

    public function login(Request $request)
    {

        $login = $request->validate([
            'email' => 'required|email',
            'password' => 'required|',
        ]);

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            return back()->with('message', 'login yamasa parol qate!');
        }

    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
