<?php
namespace App\Http\Controllers\admin\chat;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\CometChatService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function view($UserId){
        $users = User::findOrFail($UserId);
        return view('frontend.pages.chats.chat',compact('users'));
    }
}