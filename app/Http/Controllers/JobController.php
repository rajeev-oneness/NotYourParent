<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobUser;
use App\Models\UserJob;
use Illuminate\Support\Facades\Auth;
class JobController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $businessSaved = 0;
        $ip = $_SERVER['REMOTE_ADDR'];
        $jobId=$request->id;
        $term= $request->term;
        if (!empty($request->term)) {
            $job= Job::where([['title', 'LIKE', '%' . $term . '%']])
            ->orWhere('skill', 'LIKE', '%' . $term . '%')
            ->orWhere('budget', 'LIKE', '%' . $term . '%')
            ->get();
        } else {
        $job = Job::all();
        }
        if(Auth::user()){
            $user_id = Auth::user()->id;
           // dd($user_id);
            $job_id=$request->id;
            $ip = $_SERVER['REMOTE_ADDR'];
            $jobSavedResult = JobUser::where('job_id',$job_id)->where("user_id",$user_id)->where('ip',$ip)->get();

            if(count($jobSavedResult)>0){
                $businessSaved = 1;
            }else{
                $businessSaved = 0;
            }
        }
        $wishlistCheck =  JobUser::where('job_id', $jobId)->where('ip', $ip)->first();
        return view('front.job.index', compact('job','businessSaved','wishlistCheck'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job = Job::all();
        return view('front.job.add', compact('job'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            //'cat_id' => 'required',
            'title' => 'nullable|string|min:2|max:255',
            'type' => 'nullable|string|min:2',
            'description' => 'nullable|string|min:2',
            'skill' => 'nullable|string|min:2',
            'scope' => 'nullable|string|min:2',
            'start_date' => 'nullable|string|min:2',
            'end_date' => 'nullable|string|min:2',

        ]);
        $user_id = Auth::user()->id;
        $job = new Job();
        $job->cat_id = $request->cat_id;
        $job->title = $request->title;
        $job->skill = $request->skill;
        $job->description = $request->description;
        $job->scope = $request->scope;
        $job->type = $request->type;
        $job->start_date = $request->start_date;
        $job->end_date = $request->end_date;
        $job->budget = $request->budget;
        $job->sample_question = $request->sample_question;
        $job->experience = $request->experience;
        $job->location = $request->location;
        $job->duration = $request->duration;
        $job->time = $request->time;
        $job->user_id = $user_id;
        $job->save();
        return redirect()->route('front.jobs.details');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
        //
    // }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail()
    {
        $job = Job::all();
        return view('front.job.detail', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::where('id',$id)->get();
        $jobcat = JobCategory::all();
        return view('front.job.detail', compact('job', 'jobcat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job = Job::find($id);

        $request->validate([
            'category' => 'required',
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $job->update([
            'cat_id' => $request->category,
            'title' => $request->title,
            'type' => $request->subtitle,
            'description' => $request->description,
        ]);

        return redirect()->route('teacher.job.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Job::where('id', $id)->delete();
        return redirect()->route('teacher.job.index');
    }

    /**
     * save job .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function savejob(Request $request)
    {
        $businessSaved = 0;
        $userId = Auth::user()->id;
       // $job = JobUser::with('job')->where("user_id",$userId)->get();
        if(Auth::user()){
            $user_id = Auth::user()->id;
           // dd($user_id);
            $job_id=$request->id;
            $ip = $_SERVER['REMOTE_ADDR'];
            $job = JobUser::with('job')->where("user_id",$user_id)->where('ip',$ip)->get();

            if(count($job)>0){
                $businessSaved = 1;
            }else{
                $businessSaved = 0;
            }
        }
        return view('front.job.saved_job', compact('job','businessSaved'));
    }


    /**
     * save job .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function myjob(Request $request)
    {
        $userId = Auth::user()->id;
         $term= $request->term;
        if (!empty($request->term)) {
            $job= Job::where([['title', 'LIKE', '%' . $term . '%']])
            ->orWhere('skill', 'LIKE', '%' . $term . '%')
            ->orWhere('budget', 'LIKE', '%' . $term . '%')
            ->get();
        } else {
        $job = Job::where("user_id",$userId)->get();
       }
        return view('front.job.my-job', compact('job'));
    }


    /**
     * @param id
     * @param user_id
     * @return JobUser|mixed
     */
    public function saveUserJob(Request $request){
         //dd($request->all());
         $ip = $_SERVER['REMOTE_ADDR'];

        // check if collection already exists
        if(auth()->check()) {
           $collectionExistsCheck = JobUser::where('job_id', $request->id)->where('ip', $ip)->orWhere('user_id', auth()->user()->id)->first();
        } else {
           $collectionExistsCheck = JobUser::where('job_id', $request->id)->where('ip', $ip)->first();
        }

        if($collectionExistsCheck != null) {
            // if found
            $data = JobUser::destroy($collectionExistsCheck->id);
            return response()->json(['status' => 200, 'type' => 'remove', 'message' => 'Job removed from saved']);
        } else {
            // if not found
            $data = new JobUser();
            $data->user_id = auth()->user() ? auth()->user()->id : 0;
            $data->job_id = $request->id;
            $data->ip = $ip;
            $data->save();

            return response()->json(['status' => 200, 'type' => 'add', 'message' => 'Job saved']);
        }
    }
    
/**
     * @param id
     * @param user_id
     * @return JobUser|mixed
     */
    public function applyUserJob(Request $request){
        //dd($request->all());
         $ip = $_SERVER['REMOTE_ADDR'];
        //$jobId = Job::where('id',$id)->get();
        // check if collection already exists
        // if(auth()->check()) {
        //    $collectionExistsCheck = UserJob::where('job_id', $request->id)->where('ip', $ip)->orWhere('user_id', auth()->user()->id)->first();
        // } else {
        //    $collectionExistsCheck = UserJob::where('job_id', $request->id)->where('ip', $ip)->first();
        // }

        // if($collectionExistsCheck != null) {
        //     // if found
        //     $data = UserJob::destroy($collectionExistsCheck->id);
        //     return response()->json(['status' => 200, 'type' => 'remove', 'message' => 'Job removed from saved']);
        // } else {
            // if not found
            $data = new UserJob();
            $data->user_id = auth()->user() ? auth()->user()->id : 0;
            $data->job_id = $request->id;
            $data->ip = $ip;
            $data->save();

          return response()->json(['status' => 200, 'type' => 'add', 'message' => 'Proposal Added Succesfully']);
        //}
    }
    
    
    /**
     * @param $user_id
     * @return mixed
     */
    public function applied(Request $request){
         $userId = Auth::user()->id;
         $term= $request->term;
        if (!empty($request->term)) {
            $job= Job::where([['title', 'LIKE', '%' . $term . '%']])
            ->orWhere('skill', 'LIKE', '%' . $term . '%')
            ->orWhere('budget', 'LIKE', '%' . $term . '%')
            ->paginate(5);
        } else {
        $job = UserJob::where("user_id",$userId)->paginate(5);
       }
        return view('front.job.proposal', compact('job'));


    }

    /**
     * @param business_id
     * @param $user_id
     * @return mixed
     */
    public function proposal(Request $request,$id){
         $job = UserJob::where("job_id",$id)->paginate(5);
        return view('front.job.application', compact('job'));

    }


        public function user(Request $request)
    {
        $postcodeData = Job::where("title", "LIKE", "%".$request->code."%")->with('jobcat')->limit(6)->get();

        $resp = [];
        if ($postcodeData->count() > 0) {
            foreach ($postcodeData as $key => $value) {
                // dd($value->state->name);
                $resp[] = [
                    
                    // 'state' => $value->state ? $value->state->name : '',
                    'category' => $value->jobcat ? $value->jobcat->title : '',
                    'description' =>  $value->jobcat ? $value->jobcat->description : '',
                   
                ];
            }
        } else {
            $stateData = JobCategory::where("title", "LIKE", "%".$request->code."%")->limit(6)->get();
            // dd($stateData);
            if ($stateData->count() > 0) {
                foreach ($stateData as $key => $value) {
                    $firstPin = Job::where("cat_id", $value->id)->first();

                    $resp[] = [
                       
                        'category' => $value->title,
                        'description' =>  $value->description,
                    ];
                }
            }
        }

        if (count($resp) > 0) {
            return response()->json(['error' => false, 'message' => 'Details found', 'data' => $resp]);
        } else {
            return response()->json(['error' => true, 'message' => 'No details found. Try again!']);
        }
    }
}
