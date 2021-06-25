<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::with('teacherDetails')->get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = User::where('user_type', 2)->get();
        // dd($teachers);
        return view('admin.testimonial.add', compact('teachers'));
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
            'designation' => 'required',
            'title' => 'required',
            'quote' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $fileName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/'), $fileName);
        $image ='uploads/'.$fileName;
        $testimonial = new Testimonial();
        $testimonial->teacherId = $request->teacherId;
        $testimonial->image = $image;
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->title = $request->title;
        $testimonial->quote = $request->quote;
        $testimonial->save();
        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = User::where('user_type', 2)->get();
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit',compact('testimonial','teachers'));
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
            'designation' => 'required',
            'title' => 'required',
            'quote' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasFile('image')) {
            $oldImage = public_path(Testimonial::find($id)->image);
            File::delete($oldImage);
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/'), $fileName);
            $image ='uploads/'.$fileName;
            Testimonial::where('id', $id)->update([
                'image' => $image,
            ]);
        }
        Testimonial::where('id', $id)->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'title' => $request->title,
            'quote' => $request->quote,
            'teacherId' => $request->teacherId
        ]);
        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::where('id', $id)->first();
        // File::delete(public_path($testimonial->image));
        $testimonial->delete();
        return redirect()->route('admin.testimonial.index');
    }
}
