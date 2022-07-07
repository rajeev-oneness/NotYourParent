<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobCategory;
use Illuminate\Support\Facades\Auth;
class JobController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = Job::all();
        return view('front.job.index', compact('job'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job = Job::all();
        return view('teacher.job.add', compact('job'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat_id' => 'required',
            'title' => 'required|string|min:2|max:255',
            'type' => 'required|string|min:2',
            'description' => 'required|string|min:2',
            'skill' => 'required|string|min:2',
            'scope' => 'required|string|min:2',
            'start_date' => 'required|string|min:2',
            'end_date' => 'required|string|min:2',

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
        $job->user_id = $user_id;
        $job->save();
        return redirect()->route('teacher.job.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        $jobcat = JobCategory::all();
        return view('teacher.job.edit', compact('job', 'jobcat'));
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
}
