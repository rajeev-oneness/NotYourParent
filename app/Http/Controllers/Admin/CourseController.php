<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with('categoryDetail','teacherDetail')->orderBy('id', 'desc')->get();
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $experts = User::where('user_type', 2)->get();
        return view('admin.course.add', compact('categories', 'experts'));
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
            'name' => 'required|string',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
            'duration' => 'required',
            'categoryId' => 'required',
            'teacherId' => 'required',
            'preview_video_url' => 'nullable|max:50000',
            'original_video_url' => 'required',
        ]);

        // handling image upload
        $fileName = time().'-image.'.$request->image->extension();
        $request->image->move(public_path('uploads/'), $fileName);
        $image ='uploads/'.$fileName;

        // handling preview video upload
        $preview_video_url = '';
        if (!empty($request->preview_video_url)) {
            $preview_video_fileName = time().'-temvu.'.$request->preview_video_url->extension();
            $request->preview_video_url->move(public_path('uploads/'), $preview_video_fileName);
            $preview_video_url ='uploads/'.$preview_video_fileName;
        }

        // handling original video upload
        $original_video_fileName = time().'-orgvu.'.$request->original_video_url->extension();
        $request->original_video_url->move(public_path('uploads/'), $original_video_fileName);
        $original_video_url ='uploads/'.$original_video_fileName;

        $course = new Course();
        $course->categoryId = $request->categoryId;
        $course->image = $image;
        $course->preview_video_url = $preview_video_url;
        $course->original_video_url = $original_video_url;
        $course->name = $request->name;
        $course->description = $request->description;
        $course->duration = $request->duration;
        $course->price = $request->price;
        $course->teacherId = $request->teacherId;
        $course->save();
        return redirect()->route('admin.course.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $course = Course::find($id);
        $experts = User::where('user_type', 2)->get();
        return view('admin.course.edit',compact('course','categories', 'experts'));
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
        $request->validate([
            'name' => 'required|string',
            'description' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'preview_video_url' => 'nullable|max:5000',
            'original_video_url' => 'nullable',
            'price' => 'required',
            'duration' => 'required',
            'categoryId' => 'required',
            'teacherId' => 'required',
        ]);
        if($request->hasFile('image')) {
            $oldImage = public_path(Course::find($id)->image);
            File::delete($oldImage);
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/'), $fileName);
            $image ='uploads/'.$fileName;
            Course::where('id', $id)->update([
                'image' => $image,
            ]);
        }

        // preview video upload handling
        if($request->hasFile('preview_video_url')) {
            $oldFile = public_path(Course::find($id)->preview_video_url);
            File::delete($oldFile);
            $fileName = time().'-temvu.'.$request->preview_video_url->extension();
            $request->preview_video_url->move(public_path('uploads/'), $fileName);
            $videoFile ='uploads/'.$fileName;
            Course::where('id', $id)->update([
                'preview_video_url' => $videoFile,
            ]);
        }

        // original video upload handling
        if($request->hasFile('original_video_url')) {
            $oldFile = public_path(Course::find($id)->original_video_url);
            File::delete($oldFile);
            $fileName = time().'-temvu.'.$request->original_video_url->extension();
            $request->original_video_url->move(public_path('uploads/'), $fileName);
            $videoFile ='uploads/'.$fileName;
            Course::where('id', $id)->update([
                'original_video_url' => $videoFile,
            ]);
        }
        Course::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
            'categoryId' => $request->categoryId,
            'teacherId' => $request->teacherId,
        ]);
        return redirect()->route('admin.course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::where('id', $id)->first();
        // File::delete(public_path($course->image));
        $course->delete();
        return redirect()->route('admin.course.index');
    }
}
