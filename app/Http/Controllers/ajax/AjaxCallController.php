<?php

namespace App\Http\Controllers\ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request,App\Models\Course;

class AjaxCallController extends Controller
{
    public function getCourseByCategory(Request $req)
    {
        // dd($req->all());
        $req->validate([
            'categoryId' => 'required|numeric|min:1'
        ]);
        $courses = Course::where('categoryId', $req->categoryId)->with('teacherDetail')->get();
        // dd($courses);
        $view = [];
        foreach ($courses as $key => $course) {
            $view[$key] = '<div class="mentor_course"><div class="mentor_course_img"><img src="'.asset($course->image).'"><div class="mentor_course_overlay"><h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">'.substr($course->name, 0, 7).'</sub>'.substr($course->name, 7,11).' </h4> <h3 class="green proxima_exbold text-uppercase">'.substr($course->name, 18,12).'</h3><ul><li class="mentor_time"><img src="'.asset("front/images/time_icon.png").'"> '.$course->duration.' minutes</li><li class="mentor_price">'.$course->price.'$ <span>Only</span></li></ul></div></div><div class="mentor_course_content"><div class="mentor_course_review"><div class="mentor_course_review_img"><img src="'.asset($course->teacherDetail->image).'"></div><div class="mentor_course_review_name"><h5>'.$course->teacherDetail->name.'</h5><h6>'.$course->teacherDetail->short_description.'</h6></div></div><p>'.$course->description.'</p><ul><li><a href="javascript:void(0);">Consult Now</a></li><li><a href="javascript:void(0);">Visit Profile</a></li></ul></div></div>';
        }	
        return response()->json(['error' => false, 'message' => 'Courses', 'data' => $view]);
    }
}
