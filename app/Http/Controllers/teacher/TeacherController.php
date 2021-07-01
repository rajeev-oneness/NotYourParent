<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher_id = Auth::user()->id;
        $mySlots = Slot::where('teacherId',$teacher_id)->get();
        return view('teacher.my-slot.index', compact('mySlots','teacher_id'));
    }
    public function create(Request $request)
    {
        $slot = new Slot();
        $slot->teacherId = Auth::user()->id;
        $slot->date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
        $slot->time = Carbon::createFromFormat('g:i a', $request->time)->format('H:i:s');
        $slot->note = $request->note;
        $slot->save();
        return response()->json($slot);
    }
    public function allSlots()
    {
        $eventsResponse =[];
        $teacher_id = Auth::user()->id;
        $mySlots = Slot::where('teacherId',$teacher_id)->get();
        foreach ($mySlots as $event) {
            $combine = date('Y-m-d H:i:s', strtotime("$event->date $event->time"));
            $eventsResponse[] = [
                'id' => $event->id,
                'title'=>$event->note,
                'start'=>  Carbon::parse($combine)->toDateTimeString(),
               ];
        }
        return $eventsResponse;
    }
    public function updateSlot(Request $request, $id)
    {
        $slot = Slot::find($id);
        $slot->date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
        $slot->time = Carbon::createFromFormat('g:i a', $request->time)->format('H:i:s');
        $slot->note = $request->note;
        $slot->save();
        return response()->json($slot);
    }
    public function deleteSlot($id)
    {
        $slot = Slot::find($id);
        $slot->delete();
        return redirect()->route('teacher.my-slot.index');
    }
}
