<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $req)
    {
        return view('front.index');
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
