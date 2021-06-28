<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $users = User::where('user_type', 3)->get();
        return view('admin.user.index', compact('users'));
    }

    public function addNewUser(){
        return view('admin.user.add');
    }

    public function saveUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|numeric|digits:10',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = new User();
        $user->user_type = 3;
        if($request->hasFile('image')) {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/'), $fileName);
            $image ='uploads/'.$fileName;
            $user->image = $image;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = Hash::make('student');
        $user->status = 1;
        $user->is_verified = 1;
        $user->referral_code = $request->referral_code;
        $user->referred_by = '';
        $user->short_description = $request->short_description;
        $user->gender = '';
        $user->dob = '';
        $user->bio = '';
        $user->linkedin_url = '';
        $user->fb_url = '';
        $user->twitter_url = '';
        $user->instagram_url = '';
        $user->marital = '';
        $user->aniversary = '';
        $user->save();
        return redirect()->route('admin.user.index');
    }

    public function editUser($id)
    {
       $user = User::find($id);
       return view('admin.user.edit', compact('user'));
    }

    public function updateUser(Request $request, $id){
        $user = User::find($id);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user->user_type = 3;
        if($request->hasFile('image')) {
            $oldImage = public_path($user->image);
            File::delete($oldImage);
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/'), $fileName);
            $image ='uploads/'.$fileName;
            $user->update([
                'image' => $image,
            ]);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->status = 1;
        $user->is_verified = 1;
        $user->referral_code = $request->referral_code;
        $user->referred_by = '';
        $user->short_description = $request->short_description;
        $user->gender = '';
        $user->dob = '';
        $user->bio = '';
        $user->linkedin_url = '';
        $user->fb_url = '';
        $user->twitter_url = '';
        $user->instagram_url = '';
        $user->marital = '';
        $user->aniversary = '';
        $user->save();
        return redirect()->route('admin.user.index');
    }

    public function deleteUser($id){
        User::where('id', $id)->delete();
        return redirect()->route('admin.user.index');
    }

    public function updateStatus(Request $request)
    {
        $user = User::findOrFail($request->id);
        if ($user) {
            $user->status = $request->status;
            $user->save();
            return response()->json(array('message'=>'User status successfully updated'));
        }
    }
}
