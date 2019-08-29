<?php

namespace App\Http\Controllers;

use App\models\new_users;
use Illuminate\Http\Request;
use App\models\messages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse as Redirect;

class messageController extends Controller
{
    public function showSendMessage()
    {
        return view('send_message');
    }

    public function showReceivedMessages()
    {
        $data = messages::getMessageData();

        return view('received_messages')
            ->with('data_messages', $data);
    }

    public function storeSendMessage(Request $request) : Redirect
    {
        $validatedData = $request->validate([
            'title'     => 'required',
            'message'    => 'required',
            'send_to'     => 'required',
            'username_sender'  => 'required',
        ]);
        $sended_to = $request->get('send_to');
        $idSendedTo = NULL;
        $dataAllAcount = new_users::all();

        foreach ($dataAllAcount as $data) {
            if ($data->email == $sended_to)  {
                $idSendedTo = $data->id;
                break;
            }
        }
        $fill_form = array(
            'title' => $request->get('title'),
            'message' => $request->get('message'),
            'username_sender' => $request->get('username_sender'),
            'user_id' => $idSendedTo,
        );
        $device = new messages($fill_form);
        $device->save();
        return redirect('/')->with('success', 'Message sent!');
    }
}
