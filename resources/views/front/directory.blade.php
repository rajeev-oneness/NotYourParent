@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Directory
@endsection

@section('content')
<section class="inner_banner_section resource_banner directory_banner" style="background-image: url({{asset('front/images/directory-banner.jpg')}});">
    <div class="container">					
        <div class="resource_banner_content directory_banner_content">
            <h1 class="text-uppercase darkblue proxima_bold text-center">Find an <span class="proxima_black golden">Expart</span></h1>
            <div class="expart_search_wrap">
                <form action="{{route('front.directory')}}">
                    <div class="expart_search_top">
                        <div class="expart_search_grid">
                            <label>Topic</label>
                            <select name="topic">
                                <option value="" hidden>Select Topic</option>
                                @foreach ($topics as $topic)
                                    <option value="{{$topic->id}}">{{$topic->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="expart_search_grid">
                            <label>Available</label>
                            <select name="available">
                                <option value="" hidden>Select Availability</option>
                                <option>Now</option>
                                <option>No</option>
                            </select>
                        </div>
                        <div class="expart_search_grid">
                            <label>Seniority</label>
                            {{-- <input type="hidden" name="seniority" id="seniority_level" value=""> --}}
                            <select id="seniority" name="seniority">
                                <option value="" hidden>Select Seniority Level</option>
                                @for ($i = 1; $i <= 7; $i++)
                                    <option value="{{$i}}">{{$i}} {{($i == 1)? 'Year' : 'Years'}} +</option>
                                @endfor
                            </select>
                        </div>
                        <button class="search_icon_top" type="submit">
                            <img src="{{asset('front/images/search_icon.png')}}" alt="">
                        </button>
                    </div>
                </form>
                <form action="{{route('front.directory')}}">
                    <div class="expart_search_bottom">
                        <span class="proxima_black darkblue text-uppercase">or</span>
                        <input type="text" placeholder="Search an Expert via Name" name="expert" id="expert_input">
                        <button class="search_icon_bottom" type="submit">
                            <img src="{{asset('front/images/search_icon.png')}}" alt="">
                        </button>
                    </div>
                </form>
            </div>		
        </div>
    </div>
</section>
<!-- banner_section -->



<section class="mentors_section directory_mentors_section">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">On going  sessions</h2>
            <p class="darkgray proxima_light">Greater Pittsburgh's Expert Basement Waterproofing & Foundation Repair Contractor</p>
        </div>

        <div class="available_sessions">
            <h3 class="proxima_normal darkblue" id="count_section"></h3>
        </div>
        <div class="row" id="course_list">
            {{-- <div class="col-lg-4">
                <div class="mentor_course">
                    <div class="mentor_course_img">
                        <img src="{{asset('front/images/mentor-img-1.jpg')}}">
                        <div class="mentor_course_overlay">
                            <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">Let’s</sub> Learn some</h4>
                            <h3 class="green proxima_exbold text-uppercase">Lorem Ipsum</h3>
                            <ul>
                                <li class="mentor_time"><img src="{{asset('front/images/time_icon.png')}}"> 15 minutes</li>
                                <li class="mentor_price">30$ <span>Only</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mentor_course_content">
                        <div class="mentor_course_review">
                            <div class="mentor_course_review_img">
                                <img src="{{asset('front/images/testimonial-image-female.jpg')}}">
                            </div>
                            <div class="mentor_course_review_name">
                                <h5>Yasmain Marlly</h5>
                                <h6>Fashion Expert</h6>
                            </div>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum.Ipsum is simply dummy text of the printing.</p>
                        <ul>
                            <li><a href="#">Consult Now</a></li>
                            <li><a href="#">Visit Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="text-center view_all_mentor">
            <a href="javascript:void(0);" class="green_btn parimary_btn" id="load_more">Load More</a>
        </div>
    </div>
    <div class="mentors_section_plane">
        <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
    </div>
</section>
<!-- mentors_section -->

@endsection

@include('front.ajax.course-search-data')