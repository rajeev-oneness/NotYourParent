<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation;
use App\Models\Message;

class ChatController extends Controller
{
    public function chatIndex() {
        $user = auth::user();
        $user_id = $user->id;
        $data = Conversation::where('message_from', $user_id)
                ->orWhere('message_to', $user_id)
                ->join('users', 'users.id', '=', 'conversations.message_from')
                ->select('users.name', 'conversations.id')
                ->get();

        return view('teacher.chat.index', compact('data'));
    }

    public function create(Request $req) {
        $req->validate([
            'conversation_id' => 'required',
            'message' => 'required',
        ]);

        $message = new Message();
        $message->from_id = Auth::user()->id;
        $message->message = $req->message;
        $message->conversation_id = $req->conversation_id;
        $message->save();
        return redirect()->back()->with('success', 'message sent successfully');
    }
}
