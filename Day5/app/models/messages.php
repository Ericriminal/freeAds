<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class messages extends Model
{
    protected $fillable = ['title', 'message', 'username_sender', 'user_id'];

    static public function getMessageData()
    {
        return self::join('new_users', 'new_users.id', '=', 'messages.user_id')
            ->where('messages.user_id', '=', Auth::id())
            ->get();
    }
}
