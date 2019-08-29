<?php

namespace App\Http\Controllers;

use App\models\new_users;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NewUserController extends Controller
{
    protected $fillable = ["email", "password"];

    public function ShowRegister()
    {
        return view ('form');
    }

    public function Store(Request $request)
    {
        $validatedData = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);
        $device = new new_users();

        $device->email = $request->get('email');
        $device->password = bcrypt($request->get('password'));
        $device->save();

        try {
            Mail::send("test", [], function($message) use ($device)
            {
                $message->to($device->email);
                $message->from(env("MAIL_USERNAME"));
            });
        } catch (\Exception $exception) {
            dump($exception->getMessage());
        }
        return redirect('/');
    }

    public function Delete($id)
    {
        $data = new_users::findOrFail($id);
        $data->delete();
        return redirect('/');
    }

    public function Edit($id)
    {
        $data = new_users::Find($id);
        return view('edit')
            ->with('new_users', $data);
    }

    public function EditStore(Request $request, $id)
    {
        $validatedData = $request->validate([
            'email'     => 'required|email',
        ]);
        $data = new_users::Find($id);

        $data->email = $request->get('email');
        $data->save();
        return redirect('/');
    }

    public function ShowEditPassword()
    {
        return view('edit_password');
    }

    public function StoreEditPassword(Request $request, $id)
    {
        $validatedData = $request->validate([
            'current_password'     => 'required',
            'password'     => 'required',
            'check_password'     => 'required',
        ]);

        $data = new_users::Find($id);
        if (!Hash::check($request->get('current_password'), $data->password, []))
            return redirect('edit_password/'.$id.'/')->withErrors("Wrong current password.");
        else if ($request->get('password') != $request->get('check_password'))
            return redirect('edit_password/'.$id.'/')->withErrors("the new password is not the same as the one written.");

        $data->password = bcrypt($request->get('password'));
        $data->save();
        return redirect('edit/'.$id.'/')->with('msg', 'New password saved');;
    }

    public function ShowLogin()
    {
        return view('connect');
    }

    public function Login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
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
