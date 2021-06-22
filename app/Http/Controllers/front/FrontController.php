<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;use App\Models\Category;
use App\Models\Course;use App\Models\Testimonial;
use App\Models\Article;

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
            // $data->courses[$id] = Course::where('categoryId', $id)->get();
            $data->courses[] = Course::where('categoryId', $id)->get();
        }
        // dd($data);
        return view('front.index', compact('data'));
    }

    public function aboutUs(Request $req)
    {
        return view('front.about-us');
    }
    
    public function resources(Request $req)
    {
        return view('front.resources');
    }

    public function directory(Request $req)
    {
        if(empty($req)) {
            return view('front.directory');
        } else {
            return view('front.directory');
        }
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
}
