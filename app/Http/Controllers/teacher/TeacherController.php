<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use App\Models\User;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Knowledgebank;
use App\Models\Knowledgebankcategory;
use App\Models\Review;

class TeacherController extends Controller
{
    public function slotList()
    {
        // dd(date('d-m-Y'));
        $teacher_id = Auth::user()->id;
        $mySlots = Slot::where('teacherId', $teacher_id)->where('date', '>=', date('Y-m-d'))->orderBy('date', 'ASC')->get();
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
        foreach ($request->date as $key => $value) {
            $data[] = [
                'teacherId' =>  Auth::user()->id,
                'date' => Carbon::parse($request->date[$key])->format('Y-m-d'),
                'time' => Carbon::parse($request->time[$key])->format('H:i:s'),
                'note' => $request->note[$key],
            ];
        }
        if (count($data)) {
            $slot = Slot::insert($data);
            return $slot;
        }
    }
    public function deleteSlot(Request $request, $id)
    {
        Slot::where('id', $id)->delete();
        return redirect()->route('teacher.my-slots.slotList');
    }

    public function knowledgeBankIndex()
    {
        $teacher_id = Auth::user()->id;
        $knowledgebank = Knowledgebank::join('knowledgebankcategories', 'knowledgebankcategories.id', '=', 'knowledgebanks.category')->select('knowledgebanks.*', 'knowledgebankcategories.name')->where('knowledgebanks.created_by', $teacher_id)->get();
        return view('teacher.knowledgebank.index', compact('knowledgebank'));
    }
    public function knowledgeBankCreate()
    {
        $knowledgebankcategory = Knowledgebankcategory::all();
        return view('teacher.knowledgebank.add', compact('knowledgebankcategory'));
    }
    public function knowledgeBankStore(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required|string|min:2|max:255',
            'subtitle' => 'required|string|min:2',
            'description' => 'required|string|min:2',
            'image' => 'required|mimes:jpg, jpeg, png, gif, svg|max: 2048'
        ]);
        $fileName = time() . '.' . strtolower($request->image->extension());
        $request->image->move(public_path('defaultImages/knowledgebank/'), $fileName);
        $image = 'defaultImages/knowledgebank/' . $fileName;

        $teacher_id = Auth::user()->id;
        $knowledgebank = new Knowledgebank();
        $knowledgebank->image = $image;
        $knowledgebank->category = $request->category;
        $knowledgebank->title = $request->title;
        $knowledgebank->subtitle = $request->subtitle;
        $knowledgebank->description = $request->description;
        $knowledgebank->created_by = $teacher_id;

        $knowledgebank->save();
        return redirect()->route('teacher.knowledgebank.index');
    }
    public function knowledgeBankEdit($id)
    {
        $knowledgebank = Knowledgebank::find($id);
        $knowledgebankcategory = Knowledgebankcategory::all();
        return view('teacher.knowledgebank.edit', compact('knowledgebank', 'knowledgebankcategory'));
    }
    public function knowledgeBankUpdate(Request $request, $id)
    {
        $knowledgebank = Knowledgebank::find($id);

        $request->validate([
            'category' => 'required',
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $oldImage = public_path($knowledgebank->image);
            File::delete($oldImage);

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('defaultImages/knowledgebank/'), $fileName);
            $image = 'defaultImages/knowledgebank/' . $fileName;
            $knowledgebank->update([
                'image' => $image,
            ]);
        }

        $knowledgebank->update([
            'category' => $request->category,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
        ]);

        return redirect()->route('teacher.knowledgebank.index');
    }
    public function knowledgeBankDestroy($id)
    {
        Knowledgebank::where('id', $id)->delete();
        return redirect()->route('teacher.knowledgebank.index');
    }
}
