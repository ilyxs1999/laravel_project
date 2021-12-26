<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sendMessage(Request $request){
        $adresser_id = $request->input('addressee_id');
        $text = $request->input('text');
        $chat_id = $this->searchChat(Auth::id(),$adresser_id);

        if ($chat_id) {
            $this->createMessage(Auth::id(),$chat_id,$text);
        } else {
            $chat = $this->createChat($adresser_id);
            $this->createMessage(Auth::id(),$chat->id,$text);
        }
    }

    public function createMessage($id,$chat_id,$text){
        $message = new Message();
        $message->text = $text;
        $message->user_id = $id;
        $message->chat_id = $chat_id;
        $message->save();
    }

    public function createChat($adresser_id){
        $chat = new Chat();
        $chat->save();

        User::find(Auth::id())->chats()->attach($chat->id);
        User::find($adresser_id)->chats()->attach($chat->id);

        return $chat;
    }

    public function searchChat($id,$adresser_id){
        $result =   DB::table('users')
            ->join('chat_lists','chat_lists.user_id','=','users.id')
            ->join('chats','chat_lists.chat_id','=','chats.id')
            ->groupBy('chats.id')
            ->orderBy('common','desc')
            ->where('users.id','=',$id)
            ->orWhere('users.id','=',$adresser_id)
            ->limit(1)
            ->selectRaw('chat_lists.chat_id, count(users.id) as common')
            ->get();
        if ($result[0]->common==2) {
            return $result[0]->chat_id;
        } else {
            return false;
        }
    }

    public function chats(){
        return view('chats.chats',['user'=>Auth::user()]);
    }
}
