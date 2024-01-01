<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Chat;
class MessageController extends Controller
{
    public function index(){
        $users = User::whereNotIn('id', [auth()->user()->id])->get();
        // dd($users);
        $data['users'] = $users;
        return view('home', $data);
    }


    public function send_message(Request $request){

        $message = Chat::create([
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message
        ]);

        dd($message);
    }
}
