<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\models\new_users;
use App\models\adds;
use Illuminate\Support\Facades\Auth;

class NewUserController extends Controller
{
    protected $fillable = ["email", "password"];

    public function ShowIndex()
    {
        $data = adds::all();

        return view('index')
            ->with('data_adds', $data);
    }

    public function ShowRegister()
    {
        return view('register');
    }

    public function ShowLogin()
    {
        return view('login');
    }

    public function ShowEdit()
    {
        return view('edit_account');
    }

    public function ShowEditPassword()
    {
        return view('edit_password');
    }

    public function StoreRegister(Request $request)
    {
        $validatedData = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);
        $device = new new_users();

        $device->email = $request->get('email');
        $device->password = bcrypt($request->get('password'));
        $device->admin = $request->has('admin');
        $device->save();
        return redirect('/');
    }

    public function StoreEdit(Request $request)
    {
        $validatedData = $request->validate([
            'email'     => 'required|email',
        ]);
        $data = new_users::Find(Auth::id());

        $data->email = $request->get('email');
        $data->save();
        return redirect('/');
    }

    public function StoreEditPassword(Request $request)
    {
        $validatedData = $request->validate([
            'current_password'     => 'required',
            'password'     => 'required',
            'check_password'     => 'required',
        ]);
        $data = new_users::Find(Auth::id());
        if (!Hash::check($request->get('current_password'), $data->password, []))
            return redirect('edit_password')->withErrors("Wrong current password.");
        else if ($request->get('password') != $request->get('check_password'))
            return redirect('edit_password')->withErrors("the new password is not the same as the check password.");

        $data->password = bcrypt($request->get('password'));
        $data->save();
        return redirect('edit')->with('msg', 'New password saved');
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
