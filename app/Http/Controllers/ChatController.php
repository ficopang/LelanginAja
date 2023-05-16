<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function openChatpage(){
        return view('account.chat');
    }
    
    public function redirectToHomepage(){
        return view("index");
    }
}
