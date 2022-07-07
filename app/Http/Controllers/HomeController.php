<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master;
use App\Models\User;
use App\Models\Topic;
use App\Models\TeacherTopic;
use App\Models\UserLanguage;
use App\Models\Address;
use App\Models\Conversation;
use App\Models\CoursePurchase;
use App\Models\JobUser;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Review;
use App\Models\SlotBooking;
use App\Models\Transaction;
use App\Models\UserLanguagesKnown;
use App\Models\UserAvailability;
use Exception;
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
            'name' => 'nullable|max:200',
            'email' => 'nullable|email|unique:users,email,' . Auth::user()->id,
            'mobile' => 'nullable|numeric',
            'gender' => 'nullable|string|in:Male,Female,Not specified',
            'dob' => 'nullable|date_format:Y-m-d|before:' . date('Y-m-d'),
            'marital' => 'nullable|string|in:Single,Married,Divorced',
            'aniversary' => 'nullable|date_format:Y-m-d|before:' . date('Y-m-d'),
            //'short_description' => 'nullable|string|min:1|max: 15',
            'bio' => 'nullable|string',
            'linkedin_url' => 'nullable|url',
           // 'fb_url' => 'nullable|url',
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

    // chat script
    public function chatIndex(Request $req)
    {
        $loginUserId = auth()->user()->id;

        $data = Conversation::where('message_from', $loginUserId)->orWhere('message_to', $loginUserId)->get();
        return view('auth.user.chat', compact('data'));
    }

    public function create(Request $req)
    {
        $req->validate([
            'conversation_id' => 'required',
            'message' => 'required',
        ]);
        $message = new Message();
        $message->from_id = Auth::user()->id;
        $message->message = strCheck($req->message);
        $message->conversation_id = $req->conversation_id;
        $message->is_seen = 1;
        $message->save();
        $message->created_at = $message->created_at->diffForHumans();
        return response()->json(['data' => $message]);
        // return redirect()->back()->with('success', 'message sent');
    }

    // public function new(Request $req)
    // {
    //     $user_id = Auth::user()->id;
    //     $req->validate([
    //         'student_id' => 'required'
    //     ]);

    //     $convo_chk_count = Conversation::where([
    //         ['message_from', $user_id],
    //         ['message_to', $req->student_id]
    //     ])
    //         ->orWhere([
    //             ['message_to', $user_id],
    //             ['message_from', $req->student_id]
    //         ])
    //         ->count();

    //     if ($convo_chk_count == 0) {
    //         $conversation = new Conversation;
    //         $conversation->message_from = $user_id;
    //         $conversation->message_to = $req->student_id;
    //         $conversation->save();
    //         return redirect()->back();
    //     } else {
    //         return redirect()->route('user.chat.index');
    //     }
    // }

    // review script
    public function reviewIndex()
    {
        $loginUserId = auth()->user()->id;

        $data = Conversation::where('message_from', $loginUserId)->orWhere('message_to', $loginUserId)->get();
        return view('auth.user.review', compact('data'));
    }

    public function reviewCreate(Request $req)
    {
        $user = $req->user();
        if ($user) {
            $rules = [
                'rating' => 'required|numeric|min:1',
                'description' => 'required|min:1',
                'teacherId' => 'required|numeric|min:1',
            ];
            $validate = validator()->make($req->all(), $rules);

            if (!$validate->fails()) {
                // check if user reviewed before
                $chkReview = Review::where([['userId', $user->id], ['teacherId', $req->teacherId]])->count();

                if ($chkReview > 0) {
                    return response()->json(['status' => 400, 'message' => 'You can not review more than once']);
                } else {
                    // conversation between user & expert
                    $convo_chk_count = Conversation::where([
                        ['message_from', $user->id],
                        ['message_to', $req->teacherId]
                    ])->orWhere([
                        ['message_to', $user->id],
                        ['message_from', $req->teacherId]
                    ])->count();

                    if ($convo_chk_count > 0) {

                        DB::beginTransaction();

                        try {
                            $teacher = User::select('review', 'rating_count')->where('id', $req->teacherId)->first();
                            $old_rating_count = $teacher->rating_count;
                            $old_rating = $teacher->review;

                            if ($old_rating_count == 0) {
                                $new_rating = $req->rating;
                                $new_rating_count = 1;
                            } else {
                                $new_rating = ($old_rating + $req->rating) / 2;
                                $new_rating_count = $old_rating_count + 1;
                            }

                            $teacherUpdt = User::where('id', $req->teacherId)->first();
                            $teacherUpdt->review = $new_rating;
                            $teacherUpdt->rating_count = $new_rating_count;
                            $teacherUpdt->update();

                            $review = new Review();
                            $review->rating = $req->rating;
                            $review->description = $req->description;
                            $review->userId = $user->id;
                            $review->teacherId = $req->teacherId;
                            $review->save();
                            DB::commit();
                            return response()->json(['status' => 200, 'message' => 'Thanks for your review']);
                        } catch (Exception $e) {
                            DB::rollback();
                            return (object)[];
                        }
                    } else {
                        return response()->json(['status' => 400, 'message' => 'You have to purchase their content first']);
                    }
                }
            } else {
                return response()->json(['status' => 400, 'message' => $validate->errors()->first()]);
            }
        } else {
            return response()->json(['status' => 400, 'message' => 'Login first']);
        }
    }


    //user save jobs

    public function userjob($id){
        $id = Auth::user()->id;
        $userJob = JobUser::with('job')->where("user_id",$id)->get();
        $this->setPageTitle('Saved Job', 'Saved Job');
        return view('front.job.saved_job' , compact('userJob'));
    }
}
