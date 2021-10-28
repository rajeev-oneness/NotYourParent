<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master;
use App\Models\User;
use App\Models\Topic;
use App\Models\TeacherTopic;
use App\Models\UserLanguage;
use App\Models\Address;
use App\Models\CoursePurchase;
use App\Models\Notification;
use App\Models\SlotBooking;
use App\Models\Transaction;
use App\Models\UserLanguagesKnown;
use App\Models\UserAvailability;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (Auth::user()->user_type) {
            case 1:
                return redirect('admin/dashboard');
                break;
            case 2:
                return redirect('teacher/dashboard');
                break;
            case 3:
                return redirect('student/dashboard');
                break;
        }
        return view('home');
    }

    public function logout(Request $request)
    {
        auth()->guard()->logout();
        $request->session()->invalidate();
        return redirect('/');
    }

    public function userProfile(Request $req)
    {
        $user = Auth::user();
        return view('auth.user.profile', compact('user'));
    }

    public function userProfileSave(Request $req)
    {
        $req->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'mobile' => 'nullable|numeric',
            'gender' => 'nullable|string|in:Male,Female,Not specified',
            'dob' => 'nullable|date_format:Y-m-d|before:' . date('Y-m-d'),
            'marital' => 'nullable|string|in:Single,Married,Divorced',
            'aniversary' => 'nullable|date_format:Y-m-d|before:' . date('Y-m-d'),
            'short_description' => 'nullable|string|min:1|max: 15',
            'bio' => 'nullable|string',
            'linkedin_url' => 'nullable|url',
            'fb_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'hourly_rate' => 'nullable|min:1|max:10',
        ]);
        $user = Auth::user();
        $user->name = $req->name;
        $user->email = $req->email;
        if ($req->hasFile('image')) {
            $random = randomGenerator();
            $image = $req->file('image');
            $image->move('upload/users/image/', $random . '.' . $image->getClientOriginalExtension());
            $imageurl = url('upload/users/image/' . $random . '.' . $image->getClientOriginalExtension());
            $user->image = $imageurl;
        }
        $user->mobile = emptyCheck($req->mobile);
        $user->gender = emptyCheck($req->gender);
        $user->dob = emptyCheck($req->dob, true);
        $user->marital = emptyCheck($req->marital);
        $user->aniversary = emptyCheck($req->aniversary, true);
        $user->short_description = emptyCheck($req->short_description);
        $user->bio = emptyCheck($req->bio);
        $user->linkedin_url = emptyCheck($req->linkedin_url);
        $user->fb_url = emptyCheck($req->fb_url);
        $user->twitter_url = emptyCheck($req->twitter_url);
        $user->instagram_url = emptyCheck($req->instagram_url);
        $user->hourly_rate = emptyCheck($req->hourly_rate);
        $user->save();
        return back()->with('Success', 'Profile updated successFully');
    }

    public function updateUserPassword(Request $req)
    {
        $req->validate([
            'old_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $passwordVerified = false;
        $user = Auth::user();
        if (Hash::check($req->old_password, $user->password)) {
            $passwordVerified = true;
        } else {
            $master = Master::first();
            if ($master && Hash::check($req->old_password, $master->password)) {
                $passwordVerified = true;
            }
        }
        if ($passwordVerified) {
            $user->password = Hash::make($req->password);
            $user->save();
            return back()->with('Success', 'Password changed successFully');
        }
        $error['old_password'] = 'the password didnot match';
        return back()->withErrors($error)->withInput($req->all());
    }

    public function userPoints(Request $req)
    {
        $user = Auth::user();
        return view('auth.user.point_info', compact('user'));
    }

    public function userStatus(Request $req)
    {
        $user = Auth::user();
        $UserAvailability = UserAvailability::all();

        return view('auth.user.status', compact('user', 'UserAvailability'));
    }

    public function userStatusSave(Request $request)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $user = Auth::user();
        $user_id = $user->id;
        $user = User::find($user_id);
        $user->availability = $request->status;
        $user->update();
        return redirect()->back();
    }

    public function userLanguage()
    {
        $user = Auth::user();
        $userLanguagesKnown = UserLanguagesKnown::where('user_id', Auth::user()->id)
            ->join('user_languages', 'user_languages.id', '=', 'user_languages_knowns.language_id')
            ->select('user_languages_knowns.id', 'user_languages.name')
            ->get();
        $userLanguage = UserLanguage::orderBy('name')->get();
        return view('auth.user.language', compact('user', 'userLanguage', 'userLanguagesKnown'));
    }

    public function userLanguageSave(Request $request)
    {
        $request->validate([
            'language' => 'required'
        ]);

        $user = Auth::user();
        $user_id = $user->id;
        $user = User::find($user_id);

        $check_data = UserLanguagesKnown::where([
            ['user_id', $user_id],
            ['language_id', $request->language],
        ])->count();

        if ($check_data < 1) {
            $user_language_known = new UserLanguagesKnown();
            $user_language_known->user_id = Auth::user()->id;
            $user_language_known->language_id = $request->language;
            $user_language_known->save();
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Language already added');
        }
    }

    public function userLanguageDelete(Request $request, $id)
    {
        $known_language = UserLanguagesKnown::find($id);
        $known_language->delete();
        return redirect()->back()->with('success', 'Language removed');
    }

    public function userAddress()
    {
        $user_id = Auth::user()->id;
        $chk_address = Address::where('userId', $user_id)->count();
        if ($chk_address < 1) {
            return redirect()->route('user.address.new');
        } else {
            $address = Address::where('userId', $user_id)->first();
            return view('auth.user.address', compact('address'));
        }
    }

    public function userAddressCreate()
    {
        return view('auth.user.address-new');
    }

    public function userAddressSave(Request $request)
    {
        $request->validate([
            'street_address' => 'required',
            'landmark' => 'required',
            'pincode' => 'required|numeric',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'type' => 'required'
        ]);

        $address = new Address();
        $address->userId = Auth::user()->id;
        $address->address = $request->street_address;
        $address->landmark = $request->landmark;
        $address->pincode = $request->pincode;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->type = $request->type;
        $address->save();
        return redirect()->route('user.address.index');
    }

    public function userAddressEdit()
    {
        $user_id = Auth::user()->id;
        $address = Address::where('userId', $user_id)->first();
        return view('auth.user.address-edit', compact('address'));
    }

    public function userAddressUpdate(Request $request)
    {
        $request->validate([
            'street_address' => 'required',
            'landmark' => 'required',
            'pincode' => 'required|numeric',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'type' => 'required'
        ]);

        $user_id = Auth::user()->id;
        $address = Address::find($user_id);
        $address->address = $request->street_address;
        $address->landmark = $request->landmark;
        $address->pincode = $request->pincode;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->type = $request->type;
        $address->update();
        return redirect()->route('user.address.index');
    }

    public function userTopics()
    {
        $user = Auth::user();
        $teacher_topics = TeacherTopic::where('teacherId', Auth::user()->id)
            ->get();
        $topics = Topic::orderBy('name')->get();
        return view('auth.user.topic', compact('user', 'topics', 'teacher_topics'));
    }

    public function userTopicSave(Request $request)
    {
        $request->validate([
            'topicId' => 'required'
        ]);

        $user = Auth::user();
        $user_id = $user->id;
        $user = User::find($user_id);

        $check_data = TeacherTopic::where([
            ['teacherId', $user_id],
            ['topicId', $request->topicId],
        ])->count();

        if ($check_data < 1) {
            $teacher_topic = new TeacherTopic();
            $teacher_topic->teacherId = Auth::user()->id;
            $teacher_topic->topicId = $request->topicId;
            $teacher_topic->save();
            return redirect()->back()->with('success', 'Topic added successfully');
        } else {
            return redirect()->back()->with('error', 'Topic already added');
        }
    }

    public function userTopicDelete(Request $request, $id)
    {
        $teacher_topic = TeacherTopic::find($id);
        $teacher_topic->delete();
        return redirect()->back()->with('success', 'Topic removed');
    }

    public function transactionIndex(Request $request)
    {
        $user_id = Auth::user()->id;
        if ($user_id == 1) {
            $data = Transaction::latest()->get();
        } else {
            $data = Transaction::where('userId', $user_id)->latest()->get();
        }

        return view('auth.user.transaction', compact('data'));
    }

    public function sessionsIndex(Request $request)
    {
        $user_id = Auth::user()->id;
        if ($user_id == 1) {
            $data = SlotBooking::latest()->get();
        } elseif ($user_id == 2) {
            $data = SlotBooking::join('slots', 'slots.id', '=', 'slot_bookings.slotId')
                ->where('slots.teacherId', Auth::user()->id)
                ->orderBy('slot_bookings.created_at', 'DESC')
                ->get();
        } else {
            $data = SlotBooking::where('userId', $user_id)->latest()->get();
        }

        return view('auth.user.sessions', compact('data'));
    }

    public function caseStudyReport(Request $request)
    {
        $user_id = Auth::user()->id;

        if ($user_id == 1) {
            $data = CoursePurchase::latest()->get();
        } elseif ($user_id == 2) {
            $data = CoursePurchase::join('courses', 'courses.id', '=', 'course_purchases.courseId')
                ->where('courses.teacherId', Auth::user()->id)
                ->orderBy('course_purchases.created_at', 'DESC')
                ->get();
        } else {
            $data = CoursePurchase::where('userId', $user_id)->latest()->get();
        }

        return view('auth.user.case-study-report', compact('data'));
    }

    public function readIndex(Request $request)
    {
        $noti = Notification::findOrFail($request->id);
        $noti->read_flag = 1;
        $noti->save();
    }
}
