<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MyCourseControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher_id = Auth::user()->id;
        $courses = Course::where('teacherId',$teacher_id)->get();
        return view('teacher.my-course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('teacher.my-course.add', compact('categories'));
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
            'categoryId' => 'required'
        ]);
        $fileName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/'), $fileName);
        $image ='uploads/'.$fileName;
        $course = new Course();
        $course->categoryId = $request->categoryId;
        $course->image = $image;
        $course->name = $request->name;
        $course->description = $request->description;
        $course->duration = $request->duration;
        $course->price = $request->price;
        $course->teacherId = Auth::user()->id;
        $course->save();
        return redirect()->route('teacher.my-course.index');
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
        return view('teacher.my-course.edit',compact('course','categories'));
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
            'price' => 'required',
            'duration' => 'required',
            'categoryId' => 'required'
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
        Course::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
            'categoryId' => $request->categoryId
        ]);
        return redirect()->route('teacher.my-course.index');
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
        return redirect()->route('teacher.my-course.index');
    }
}
