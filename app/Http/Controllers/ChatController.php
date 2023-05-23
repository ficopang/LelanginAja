<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function openChatPage($chat_id = null){
        $chats = DB::table('chats')->where('sender_id', auth()->id())->orWhere('receiver_id', auth()->id())->get();

        $users = $chats->map(function ($chats){
            if ($chats->sender_id === auth()->id()) {
                return $chats->receiver_id;
            }
            return $chats->sender_id;
        })->unique();

        if(!$chat_id){
            $chat_id = $users->first();
        }

        $userLists = $users->map(function ($users){
            $user = User::find($users);
            $user->text = DB::table('chats')->where('sender_id', $user->id)->orWhere('receiver_id', $user->id)->latest("created_at")->first()->text;
            return $user;
        });

        $currentUser = User::find($chat_id);
        return view('account.chat', compact('chats', 'chat_id','userLists', 'currentUser'));
    }

    public function postChat(Request $request ,$chat_id){
        $currChat = $request->validate([
            'chat-message' => 'required'
        ]);

        $chat = new Chat();
        $chat->text = $currChat['chat-message'];
        $chat->sender_id = auth()->id();
        $chat->receiver_id = $chat_id;

        $chat->save();
        return redirect()->back();
    }
}
