<?php

namespace App\Http\Controllers;

use App\models\new_users;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function showIndex()
    {
        $new_users = new_users::all();

        return view ('index')
            ->with('new_users', $new_users);
    }
}
