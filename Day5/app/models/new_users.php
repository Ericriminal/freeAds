<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class new_users extends Authenticatable
{
    protected $fillable = ['email', 'username', 'password'];

    static public function getMessageData()
    {
        return new_users::join('new_users', 'new_users.id', '=', 'messages.user_id')
            ->join('new_users', 'new_users.id', '=', 'state.country_id')
            ->get();
    }
}
