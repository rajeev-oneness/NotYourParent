<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User,App\Models\UserType;
use Illuminate\Http\Request,DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $users = User::select('*')->where('user_type','!=',1);
        $users = $users->orderBy('users.id','desc')->get();
        return view('admin.user.index', compact('users'));
    }

    public function manageUser(Request $req)
    {
        $rules = [
            'userId' => 'required|min:1|numeric',
            'action' => 'required|in:block,unblock,delete',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $user = User::find($req->userId);
            if($user){
                if($req->action == 'block'){
                    $user->status = 0;$user->save();
                }elseif($req->action == 'unblock'){
                    $user->status = 1;$user->save();
                }elseif($req->action == 'delete'){
                    $user->delete();
                }
                return successResponse('status Updated Success',$user);
            }
            return errorResponse('Invalid User Id');
        }
        return errorResponse($validator->errors()->first());
    }

    public function createUser(Request $req)
    {
        $userType = UserType::orderBy('id','desc')->get();
        return view('admin.user.create',compact('userType'));
    }

    public function saveUseoldr(Request $req)
    {
        $req->validate([
            'user_type' => 'required|min:1|numeric',
            'image' => '',
            'name' => 'required|max:255|string',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|digits:10|numeric',
            'referral' => 'string|nullable|exists:referrals,code',
        ]);
        DB::beginTransaction();
        try {
            $random = randomGenerator();
            $user = new User();
            $user->user_type = $req->user_type;
            $user->name = $req->name;
            $user->email = $req->email;
            $user->mobile = $req->mobile;
            if($req->hasFile('image')){
                $image = $req->file('image');
                $image->move('upload/users/image/',$random.'.'.$image->getClientOriginalExtension());
                $imageurl = url('upload/users/image/'.$random.'.'.$image->getClientOriginalExtension());
                $user->image = $imageurl;
            }
            $user->password = Hash::make($random);
            $user->save();
            $this->setReferralCode($user,$req->referral);
            DB::commit();
            // sendMail();
            return redirect(route('admin.users'))->with('Success','User Added SuccessFully');
        } catch (Exception $e) {
            DB::rollback();
            $errors['email'] = 'Something went wrong please try after sometime!';
            return back()->withErrors($errors)->withInput($req->all());
        }
    }

    /****************************** Referral List ******************************/
    public function getReferredToList(Request $req,$userId)
    {
        $user = User::findorFail($userId);
        return view('admin.referral.referred_to',compact('user'));
    }

/****************************** User List ******************************/
    public function getUserPoints(Request $req,$userId)
    {
        $user = User::findorFail($userId);
        return view('auth.user.point_info',compact('user'));
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
