<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;
class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobcat = JobCategory::all();
        return view('admin.jobcat.index', compact('jobcat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobcat = JobCategory::all();
        return view('admin.jobcat.create', compact('jobcat'));
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

            'title' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:2',

        ]);
        $job = new JobCategory();
        $job->title = $request->title;
        $job->description = $request->description;
        $job->save();
        return redirect()->route('admin.jobcat.index');
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
        //$job = Job::find($id);
        $jobcat = JobCategory::find($id);
        return view('admin.jobcat.edit', compact('jobcat'));
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
        $job = JobCategory::find($id);

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $job->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.jobcat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobCategory::where('id', $id)->delete();
        return redirect()->route('admin.jobcat.index');
    }
}
