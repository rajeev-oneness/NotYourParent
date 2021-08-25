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
}
