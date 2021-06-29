<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    public function getAllTeachers()
    {
        $teachers = User::where('user_type', 2)->get();
        return view('admin.teacher.index', compact('teachers'));
    }

    public function addNewTeacher(){
        return view('admin.teacher.add');
    }

    public function saveTeacher(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'mobile' => 'numeric|digits:10',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $teacher = new User();
        $teacher->user_type = 2;
        if($request->hasFile('image')) {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/'), $fileName);
            $image ='uploads/'.$fileName;
            $teacher->image = $image;
        }
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->mobile = $request->mobile;
        $teacher->password = Hash::make('teacher');
        $teacher->status = 1;
        $teacher->is_verified = 1;
        $teacher->referral_code = $request->referral_code;
        $teacher->referred_by = '';
        $teacher->short_description = $request->short_description;
        $teacher->gender = '';
        $teacher->dob = '';
        $teacher->bio = '';
        $teacher->linkedin_url = '';
        $teacher->fb_url = '';
        $teacher->twitter_url = '';
        $teacher->instagram_url = '';
        $teacher->marital = '';
        $teacher->aniversary = '';
        $teacher->save();
        return redirect()->route('admin.teacher.index');
    }

    public function editTeacher($id)
    {
       $teacher = User::find($id);
       return view('admin.teacher.edit', compact('teacher'));
    }

    public function updateTeacher(Request $request, $id){
        $teacher = User::find($id);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'mobile' => 'numeric|digits:10',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $teacher->user_type = 2;
        if($request->hasFile('image')) {
            $oldImage = public_path($teacher->image);
            File::delete($oldImage);
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/'), $fileName);
            $image ='uploads/'.$fileName;
            $teacher->update([
                'image' => $image,
            ]);
        }
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->mobile = $request->mobile;
        $teacher->status = 1;
        $teacher->is_verified = 1;
        $teacher->referral_code = $request->referral_code;
        $teacher->referred_by = '';
        $teacher->short_description = $request->short_description;
        $teacher->gender = '';
        $teacher->dob = '';
        $teacher->bio = '';
        $teacher->linkedin_url = '';
        $teacher->fb_url = '';
        $teacher->twitter_url = '';
        $teacher->instagram_url = '';
        $teacher->marital = '';
        $teacher->aniversary = '';
        $teacher->save();
        return redirect()->route('admin.teacher.index');
    }

    public function deleteTeacher($id){
        User::where('id', $id)->delete();
        return redirect()->route('admin.teacher.index');
    }

    public function updateStatus(Request $request)
    {
        $teacher = User::findOrFail($request->id);
        if ($teacher) {
            $teacher->status = $request->status;
            $teacher->save();
            return response()->json(array('message'=>'Teacher status successfully updated'));
        }
    }
}
