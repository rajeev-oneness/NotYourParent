<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;use App\Models\Category;
use App\Models\Course;use App\Models\Testimonial;
use App\Models\Article;use App\Models\Topic;
use App\Models\TeacherTopic;

class FrontController extends Controller
{
    public function index(Request $req)
    {
        $data = (object)[];
        $data->categories = Category::get();
        $data->testimonials = Testimonial::limit(5)->get();
        $data->articles = Article::limit(3)->get();
        $categoryId = [];
        foreach($data->categories as $cat){
            $categoryId[] = $cat->id;
        }
        foreach ($categoryId as $id) {
            $data->courses[] = Course::where('categoryId', $id)->get();
        }
        if(request()->routeIs('front.about-us')) {
            return view('front.about-us', compact('data'));
        }
        if(request()->routeIs('front.home')) {
            return view('front.index', compact('data'));
        }
    }

    // public function aboutUs(Request $req)
    // {
    //     return $this->index();
    // }
    
    public function resources(Request $req)
    {
        return view('front.resources');
    }

    public function directory(Request $req)
    {
        $topics = Topic::get();
        $request = $req->all();
        return view('front.directory', compact('request', 'topics'));
    }
    
    public function directorySearch(Request $req)
    {
        $req->validate([
            'page' => 'required|min:0|numeric',
            'search' => 'nullable|string',
            'topic' => 'nullable|numeric|min:1',
            'available' => 'nullable|string',
            'seniority' => 'nullable|numeric|min:1',
            'expert' => 'nullable|string',
        ]);
        $reqs = $req->except('_token');
        $offset = $req->page * 9;
        $course = Course::select('*', 'courses.id AS course_id', 'courses.name AS course_name', 'courses.image AS course_img', 'courses.description AS course_desc');
        if(!empty($req->search)) {
            $course = $course->where('name', 'like', '%'.$req->search.'%');
        }
        if(!empty($req->expert)) {
            $name = $req->expert;
            $course = $course->leftjoin('users','courses.teacherId','=','users.id')->where('users.name','like',"%$name%");
        }
        if(!empty($req->topic)) {
            $topic = $req->topic;
            $course = $course->leftjoin('teacher_topics','courses.teacherId','=','teacher_topics.teacherId')->where('teacher_topics.topicId',$topic);
        }
        // if(!empty($req->available)) {}
        if(!empty($req->seniority)) {
            $seniority = $req->seniority;
            $seniorityDate = date("Y-m-d", strtotime("-$seniority years"));
            $course = $course->leftjoin('experiences','courses.teacherId','=','experiences.teacherId')->where('experiences.teaching_started', '<=', $seniorityDate);
        }
        $total = $course->count();
        $course = $course->with('teacherDetail')->limit(9)->offset($offset)->get();
        // dd($course);
        return response()->json(['error' => false, 'message' => 'Course Data', 'data' => $course, 'total' => $total, 'requests' => $reqs]);
    }

    public function experts(Request $req)
    {
        // $data = $req->all();
        return view('front.experts');
    }
    
    public function signUp(Request $req)
    {
        $data = $req->all();
        return view('front.sign-up', compact('data'));
    }

    public function howItWorks(Request $req)
    {
        return view('front.how-it-works');
    }
    
    public function categories(Request $req)
    {
        if(!empty($req->category)) {
            //
        }
        return view('front.categories');
    }

    public function knowledgeBank(Request $req)
    {
        if(!empty($req->detailId)) {
            return view('front.knowledge-bank-details');
        }
        return view('front.knowledge-bank');
    }
}
