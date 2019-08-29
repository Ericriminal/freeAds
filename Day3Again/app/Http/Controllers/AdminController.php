<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\models\new_users;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function ShowAdmin()
    {
        $data = new_users::all();

        return view('admin')
            ->with('data_account', $data);
    }

    public function ShowAdminEditAccount()
    {
        $data = session()->get('data');

        return view('admin_edit_account')
            ->with('data', $data);
    }

    public function ShowAdminCreateAccount()
    {
        $data = session()->get('data');

        return view('create_admin_account')
            ->with('data', $data);
    }

    public function PostActionAdminAccount(Request $request) {

        $id_account = $request->get('id_account');

        if ($request->get('post_action') == 'edit')
            return $this->RedirectEditOldAccount($id_account);
        else if ($request->get('post_action') == 'delete')
            return $this->DeleteAccount($id_account);
    }

    public function RedirectEditOldAccount($id_account) {
        $data = new_users::Find($id_account);

        return redirect('admin_edit_account')
            ->with('data', $data);
    }

    public function DeleteAccount($id_account) {
        $data = new_users::Find($id_account);
        $data->delete();
        return redirect('admin');
    }

    public function StoreAdminEditAccount(Request $request)
    {
        $validatedData = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);
        $device = new_users::Find($request->get('id_account'));

        $device->email = $request->get('email');
        $device->password = bcrypt($request->get('password'));
        $device->admin = $request->has('admin');
        $device->save();
        return redirect('admin');
    }

    public function StoreAdminRegister(Request $request)
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
        return redirect('admin');
    }
}
