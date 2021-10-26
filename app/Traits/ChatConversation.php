<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation;

trait ChatConversation {

    public function newConvo(Request $req)
    {
        $user_id = Auth::user()->id;
        $student_id = $req->student_id;

        $req->validate([
            'student_id' => 'required'
        ]);

        $convo_chk_count = Conversation::where([
                        ['message_from', $user_id],
                        ['message_to', $student_id]
                    ])
                    ->orWhere([
                        ['message_to', $user_id],
                        ['message_from', $student_id]
                    ])
                    ->count();

        if ($convo_chk_count == 0) {
            $conversation = new Conversation;
            $conversation->message_from = $user_id;
            $conversation->message_to = $student_id;
            $conversation->save();
            $response = 'success';
        } else {
            $response = 'fail';
        }

        return $response;
    }
}