<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\ChatTxn;

class TeacherController extends Controller
{
    public function slotList()
    {
        // dd(date('d-m-Y'));
        $teacher_id = Auth::user()->id;
        $mySlots = Slot::where('teacherId',$teacher_id)->where('date','>=',date('Y-m-d'))->orderBy('date','ASC')->get();
        // dd($mySlots);
        return view('teacher.my-slot.list', compact('mySlots'));
    }
    public function getSingle($date)
    {
        $slots = Slot::where('date', $date)->get();
        return $slots;
    }
    public function updateSlot(Request $request, $date)
    {
        Slot::where('date', $date)->delete();
        $data = [];
        foreach($request->date as $key => $value){
            $data[] = [
                'teacherId' =>  Auth::user()->id,
                'date' => Carbon::parse($request->date[$key])->format('Y-m-d'),
                'time' => Carbon::parse($request->time[$key])->format('H:i:s'),
                'note' => $request->note[$key],
            ];
        }
        if(count($data)){
            $slot = Slot::insert($data);
            return $slot;
        }
    }
    public function deleteSlot(Request $request, $id)
    {
        Slot::where('id', $id)->delete();
        return redirect()->route('teacher.my-slots.slotList');
    }

    // chat script
    public function chatIndex() {
        $user = auth::user();
        $user_id = $user->id;
        $data = Conversation::where('message_from', $user_id)
                ->orWhere('message_to', $user_id)
                ->join('users', 'users.id', '=', 'conversations.message_from')
                ->select('users.name', 'conversations.id')
                ->get();

        $user = User::where('user_type', 3)->orderBy('name')->get();

        return view('teacher.chat.index', compact('data', 'user'));
    }

    public function single($id) {
        $message = Message::get();
        dd($message);
        // return view('teacher.chat.index', compact('message'));
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
        return redirect()->back()->with('success', 'message sent');
    }

    public function new(Request $req) {
        $user_id = Auth::user()->id;
        $req->validate([
            'student_id' => 'required'
        ]);

        $convo_chk_count = Conversation::where([
                        ['message_from', $user_id],
                        ['message_to', $req->student_id]
                    ])
                    ->orWhere([
                        ['message_to', $user_id],
                        ['message_from', $req->student_id]
                    ])
                    ->count();

        if ($convo_chk_count == 0) {
            $conversation = new Conversation;
            $conversation->message_from = $user_id;
            $conversation->message_to = $req->student_id;
            $conversation->save();
            return redirect()->back();
        } else {
            return redirect()->route('teacher.chat.index');
        }
    }
}
