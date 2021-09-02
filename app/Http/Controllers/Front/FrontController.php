<?php

namespace App\Http\Controllers\front;

use App\Models\Slot;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User,App\Models\Category;
use App\Models\Article,App\Models\ArticleTag;
use App\Models\Course,App\Models\Testimonial;
use App\Models\Knowledgebank;
use App\Models\Topic,App\Models\TeacherTopic;
use App\Models\Faq;

class FrontController extends Controller
{
    public function index(Request $req)
    {
        // generateSlot(4, 7, '10:00:00', '19:00:00', 'Asia/Calcutta');
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
            $faq_data = Faq::all();
            return view('front.about-us', compact('data', 'faq_data'));
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
            'categoryId' => 'nullable|numeric|min:1',
            'topic' => 'nullable|numeric|min:1',
            'available' => 'nullable|string',
            'seniority' => 'nullable|numeric|min:1',
            'expert' => 'nullable|string',
        ]);
        // $reqs = $req->except('_token');
        $reqs = $req->all();
        $offset = $req->page * 9;
        $course = Course::select('*', 'courses.id AS course_id', 'courses.name AS course_name', 'courses.image AS course_img', 'courses.description AS course_desc');
        if(!empty($req->search)) {
            $course = $course->where('name', 'like', '%'.$req->search.'%');
        }
        if(!empty($req->categoryId)) {
            // $course = $course->where('categoryId', $req->categoryId);
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
        $currentDate = date('Y-m-d');
        if(!empty($req->currentDate)){
            $currentDate = date('Y-m-d',strtotime($req->currentDate));
        }
        if(!empty($req->expertId)) {
            $expId = $req->expertId;
            $teacher = User::find($req->expertId);
            // dd( $teacher);
            $topics = TeacherTopic::where('teacherId', $req->expertId)->get();
            $testimonials = Testimonial::where('teacherId', $req->expertId)->get();
            // dd($testimonials);
            $courses = Course::where('teacherId', $req->expertId)->limit(9)->get();
            $reviews = Review::where('teacherId', $req->expertId)->get();
            // dd($reviews);
            return view('front.experts', compact('expId', 'teacher', 'topics', 'testimonials','courses','reviews','currentDate'));
        }
        // dd($data);
        
    }
    
    public function getSingleDate($expertId,$date)
    {
        $slots = Slot::where(['date', $date, 'expertId', $expertId])->get();
        dd($slots);
        return $slots;
    }
    public function signUp(Request $req)
    {
        $data = $req->all();
        $categories = Category::get();
        return view('front.sign-up', compact('data', 'categories'));
    }
    public function login() {
        return view('front.login');
    }

    public function howItWorks(Request $req)
    {
        return view('front.how-it-works');
    }
    
    public function categories(Request $req)
    {
        $categories = Category::get();
        return view('front.categories', compact('categories'));
    }

    public function knowledgeBank(Request $req)
    {
        if(!empty($req->detailId)) {
            $knowledgebank = Knowledgebank::join('knowledgebankcategories', 'knowledgebankcategories.id', '=', 'knowledgebanks.category')->where('knowledgebanks.id', $req->detailId)->first();
            $knowledgebankAll = Knowledgebank::join('knowledgebankcategories', 'knowledgebankcategories.id', '=', 'knowledgebanks.category')->select('knowledgebanks.*', 'knowledgebankcategories.name')->get();
            return view('front.knowledge-bank-details', compact('knowledgebank', 'knowledgebankAll'));
        }
        $knowledgebank = Knowledgebank::join('knowledgebankcategories', 'knowledgebankcategories.id', '=', 'knowledgebanks.category')->select('knowledgebanks.*', 'knowledgebankcategories.name')->get();
        return view('front.knowledge-bank', compact('knowledgebank'));
    }
    
    public function articles(Request $req)
    {
        if(!empty($req->articleId)) {
            $articleTags = ArticleTag::where('articleId', $req->articleId)->get();
            $article = Article::find($req->articleId);
            $randomArticles = Article::inRandomOrder()->limit(5)->get();
            // dd($randomArticles);
            return view('front.articles', compact('article', 'articleTags', 'randomArticles'));
        }
        // return view('front.articles');
    }

    public function getSlotByDate(Request $req) {
        $slot = Slot::where('teacherId', $req->expertId)->where('date', $req->date)->get();
        // dd($slot);
        $date = date('D M d', strtotime($req->date));
        
        return response()->json(['data' => $slot, 'date' => $date]);
    }
}
