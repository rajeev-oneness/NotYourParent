<?php

namespace App\Http\Controllers\front;

use App\Models\Slot;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User, App\Models\Category;
use App\Models\Article, App\Models\ArticleTag;
use App\Models\Course, App\Models\Testimonial;
use App\Models\Knowledgebank;
use App\Models\Topic, App\Models\TeacherTopic;
use App\Models\Faq;
use App\Models\Settings;
use App\Models\UserLanguagesKnown;

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
        foreach ($data->categories as $cat) {
            $categoryId[] = $cat->id;
        }
        foreach ($categoryId as $id) {
            $data->courses[] = Course::where('categoryId', $id)->get();
        }
        if (request()->routeIs('front.about-us')) {
            $faq_data = Faq::all();
            $settings = Settings::where('key', 'about_us_main')->first();
            return view('front.about-us', compact('data', 'faq_data', 'settings'));
        }
        if (request()->routeIs('front.home')) {
            if (count($categoryId) > 0) {
                $data->experts[] = User::where('primary_category', $categoryId[0])->where('user_type', 2)->get();
            }
            $how_it_works_main = Settings::where('key', 'how_it_works_main')->first();
            $how_it_works_child = Settings::where('key', 'how_it_works_child')->get();
            return view('front.index', compact('data', 'how_it_works_main', 'how_it_works_child'));
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
        if (!empty($req->search)) {
            $course = $course->where('name', 'like', '%' . $req->search . '%');
        }
        if (!empty($req->categoryId)) {
            // $course = $course->where('categoryId', $req->categoryId);
        }
        if (!empty($req->expert)) {
            $name = $req->expert;
            $course = $course->leftjoin('users', 'courses.teacherId', '=', 'users.id')->where('users.name', 'like', "%$name%");
        }
        if (!empty($req->topic)) {
            $topic = $req->topic;
            $course = $course->leftjoin('teacher_topics', 'courses.teacherId', '=', 'teacher_topics.teacherId')->where('teacher_topics.topicId', $topic);
        }
        // if(!empty($req->available)) {}
        if (!empty($req->seniority)) {
            $seniority = $req->seniority;
            $seniorityDate = date("Y-m-d", strtotime("-$seniority years"));
            $course = $course->leftjoin('experiences', 'courses.teacherId', '=', 'experiences.teacherId')->where('experiences.teaching_started', '<=', $seniorityDate);
        }
        $total = $course->count();
        $course = $course->with('teacherDetail')->limit(9)->offset($offset)->get();
        // dd($course);
        return response()->json(['error' => false, 'message' => 'Course Data', 'data' => $course, 'total' => $total, 'requests' => $reqs]);
    }

    public function experts()
    {
        $experts = User::where('user_type', 2)->get();
        return view('front.experts', compact('experts'));
    }

    public function expertsSingle(Request $req)
    {
        $currentDate = date('Y-m-d');
        if (!empty($req->currentDate)) {
            $currentDate = date('Y-m-d', strtotime($req->currentDate));
        }
        if (!empty($req->expertId)) {
            $expId = $req->expertId;
            $teacher = User::find($req->expertId);
            // dd( $teacher);
            $topics = TeacherTopic::where('teacherId', $req->expertId)->get();
            $testimonials = Testimonial::where('teacherId', $req->expertId)->get();
            // dd($testimonials);
            $courses = Course::where('teacherId', $req->expertId)->limit(9)->get();
            $coursesCount = Course::where('teacherId', $req->expertId)->count();
            $reviews = Review::where('teacherId', $req->expertId)->get();

            $userLanguagesKnown = UserLanguagesKnown::where('user_id', $req->expertId)
                ->join('user_languages', 'user_languages.id', '=', 'user_languages_knowns.language_id')
                ->get();
            // dd($reviews);
            return view('front.experts-single', compact('expId', 'teacher', 'topics', 'testimonials', 'courses', 'reviews', 'currentDate', 'coursesCount', 'userLanguagesKnown'));
        }
        // dd($data);
    }

    public function expertsDates(Request $req)
    {
        $currentDate = date('Y-m-d');
        if (!empty($req->currentDate)) {
            $currentDate = date('Y-m-d', strtotime($req->currentDate));
        }
        if (!empty($req->expertId)) {
            $expId = $req->expertId;
            $teacher = User::find($req->expertId);
            // dd( $teacher);
            $topics = TeacherTopic::where('teacherId', $req->expertId)->get();
            $testimonials = Testimonial::where('teacherId', $req->expertId)->get();
            // dd($testimonials);
            $courses = Course::where('teacherId', $req->expertId)->limit(9)->get();
            $coursesCount = Course::where('teacherId', $req->expertId)->count();
            $reviews = Review::where('teacherId', $req->expertId)->get();
            // dd($reviews);

            $userLanguagesKnown = UserLanguagesKnown::where('user_id', $req->expertId)
                ->join('user_languages', 'user_languages.id', '=', 'user_languages_knowns.language_id')
                ->get();
            return view('front.experts-single', compact('expId', 'teacher', 'topics', 'testimonials', 'courses', 'reviews', 'currentDate', 'coursesCount', 'userLanguagesKnown'));
        }
    }

    public function getSingleDate($expertId, $date)
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
    public function login()
    {
        return view('front.login');
    }

    public function howItWorks(Request $req)
    {
        $how_it_works_main = Settings::where('key', 'how_it_works_main')->first();
        $how_it_works_child = Settings::where('key', 'how_it_works_child')->get();
        return view('front.how-it-works', compact('how_it_works_main', 'how_it_works_child'));
    }

    public function categories(Request $req)
    {
        $categories = Category::get();
        return view('front.categories', compact('categories'));
    }

    public function knowledgeBank(Request $req)
    {
        if (!empty($req->detailId)) {
            $knowledgebank = Knowledgebank::join('knowledgebankcategories', 'knowledgebankcategories.id', '=', 'knowledgebanks.category')->where('knowledgebanks.id', $req->detailId)->first();

            $knowledgebankAll = Knowledgebank::join('knowledgebankcategories', 'knowledgebankcategories.id', '=', 'knowledgebanks.category')->select('knowledgebanks.*', 'knowledgebankcategories.name')->get();
            return view('front.knowledge-bank-details', compact('knowledgebank', 'knowledgebankAll'));
        } else {
            if (!empty($req->content)) {
                if ($req->content == 'in-house') {
                    $knowledgebank = Knowledgebank::join('knowledgebankcategories', 'knowledgebankcategories.id', '=', 'knowledgebanks.category')->select('knowledgebanks.*', 'knowledgebankcategories.name')->where('knowledgebanks.category', 1)->get();
                    return view('front.knowledge-bank', compact('knowledgebank'));
                } else {
                    $knowledgebank = Knowledgebank::join('knowledgebankcategories', 'knowledgebankcategories.id', '=', 'knowledgebanks.category')->select('knowledgebanks.*', 'knowledgebankcategories.name')->where('knowledgebanks.category', 2)->get();
                    return view('front.knowledge-bank', compact('knowledgebank'));
                }
            } else {
                $knowledgebank = Knowledgebank::join('knowledgebankcategories', 'knowledgebankcategories.id', '=', 'knowledgebanks.category')->select('knowledgebanks.*', 'knowledgebankcategories.name')->get();
                return view('front.knowledge-bank', compact('knowledgebank'));
            }
        }
    }

    public function articleSingle(Request $req)
    {
        if (!empty($req->articleId)) {
            $articleTags = ArticleTag::where('articleId', $req->articleId)->get();
            $article = Article::find($req->articleId);
            $randomArticles = Article::inRandomOrder()->limit(5)->get();
            // dd($randomArticles);
            return view('front.articles-single', compact('article', 'articleTags', 'randomArticles'));
        }
        // return view('front.articles-single');
    }

    public function articles()
    {
        $data = (object)[];
        $data->categories = Category::get();
        $data->testimonials = Testimonial::limit(5)->get();
        $data->articles = Article::orderBy('id', 'desc')->get();
        $categoryId = [];
        foreach ($data->categories as $cat) {
            $categoryId[] = $cat->id;
        }
        foreach ($categoryId as $id) {
            $data->courses[] = Course::where('categoryId', $id)->get();
        }
        return view('front.articles', compact('data'));
    }

    public function getSlotByDate(Request $req)
    {
        $slot = Slot::where('teacherId', $req->expertId)->where('date', $req->date)->get();
        // dd($slot);
        $date = date('D M d', strtotime($req->date));

        return response()->json(['data' => $slot, 'date' => $date]);
    }

    public function coursesSingle(Request $req, $courseId)
    {
        if (!empty($req->courseId)) {
            $course = Course::join('categories', 'categories.id', '=', 'courses.categoryId')->select('courses.*', 'categories.name as category_name')->find($req->courseId);
            $randomCourses = Course::inRandomOrder()->limit(5)->get();
            return view('front.course-single', compact('course', 'randomCourses'));
        }
    }

    public function courses()
    {
        $data = Course::orderBy('id', 'desc')
            ->join('categories', 'categories.id', '=', 'courses.categoryId')
            ->join('users', 'users.id', '=', 'courses.teacherId')
            ->select('courses.*', 'users.id as expert_id', 'users.name as expert_name', 'users.image as expert_image', 'users.short_description as expert_short_desc', 'categories.name as cat_name')
            ->paginate(6);

        $categories = Category::get();
        return view('front.courses', compact('data', 'categories'));
    }

    public function categoryWiseCourses($id)
    {
        $data = Course::orderBy('id', 'desc')
            ->join('categories', 'categories.id', '=', 'courses.categoryId')
            ->join('users', 'users.id', '=', 'courses.teacherId')
            ->select('courses.*', 'users.id as expert_id', 'users.name as expert_name', 'users.image as expert_image', 'users.short_description as expert_short_desc', 'categories.name as cat_name', 'categories.image as cat_image')
            ->where('categoryId', $id)
            ->paginate(6);

        $experts_data = User::where('user_type', 2)->where('primary_category', $id)->get();

        $categoryName = Category::where('id', '=', $id)->select('name', 'image')->first();
        return view('front.courses-category-wise', compact('data', 'experts_data', 'categoryName'));
    }

    public function expertSearch(Request $req)
    {
        $value = $req->value;

        $experts =  User::withTrashed()
                    ->where('user_type', 2)
                    ->where('teacher_topics.deleted_at', null)
                    ->where('users.name', 'LIKE','%'.$value.'%')
                    ->orWhere('users.email', 'LIKE','%'.$value.'%')
                    ->join('categories', 'categories.id', '=', 'users.primary_category')
                    ->leftJoin('teacher_topics', 'teacher_topics.teacherId', '=', 'users.id')
                    ->leftjoin('topics', 'topics.id', '=', 'teacher_topics.topicId')
                    ->select('users.id', 'users.image', 'users.name', 'categories.name as primary_category', 'topics.name as topic_name')
                    ->limit(5)
                    ->get();

        return response()->json(['data' => $experts]);
    }

    public function privacyPolicyIndex()
    {
        $privacyPolicy = Settings::where('key', 'privacy_policy')->first();
        return view('front.privacy-policy', compact('privacyPolicy'));
    }

    public function termsAndConditionsIndex()
    {
        $privacyPolicy = Settings::where('key', 'terms_and_conditions')->first();
        return view('front.privacy-policy', compact('privacyPolicy'));
    }
}
