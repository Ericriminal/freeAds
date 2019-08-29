<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\new_users;

class newUserController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function storeRegister(Request $request)
    {
        $validatedData = $request->validate([
            'email'     => 'required|email',
            'username'  => 'required',
            'password'  => 'required',
        ]);
        $fill_form = array(
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'username' => $request->get('username'),
        );
        $device = new new_users($fill_form);

        $device->save();
        return redirect('/')->with('success', 'Your account has successfully registered!');
    }

    public function login(Request $request)
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

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
