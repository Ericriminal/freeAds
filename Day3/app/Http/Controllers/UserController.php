<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\models\new_user;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function ShowIndex()
    {
        return view('index');
    }

    public function ShowRegister()
    {
        return view('register');
    }
    public function ShowLogin()
    {
        return view('login');
    }

    public function StoreRegister(Request $request)
    {
        $validatedData = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);
        $device = new new_user();

        $device->email = $request->get('email');
        $device->password = bcrypt($request->get('password'));
        $device->save();
        return redirect('/');
    }

    public function Login(Request $request)
    {
        $validatedData = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')->withErrors("Incorrect mail or password");
        } else {
            return redirect('login');
        }
    }
    public function Logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
