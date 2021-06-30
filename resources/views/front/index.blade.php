@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Home
@endsection

@section('content')
<section class="banner_section" style="background-image: url({{asset('front/images/banner.png')}});">
    <div class="container">					
        <div class="banner_content">
            <h3 class="text-uppercase black">Not Only <span class="proxima_black green">Your Parent</span></h3>
            <h1 class="text-uppercase proxima_bold">ALSO WE CAN <br><strong class="proxima_black">HELP YOU<span>!</span></strong></h1>
            <p>Lorem ipsum dolor sit amet, <span>consectetur adipiscing</span> elit. Proin at risus. <span>Sed nec congue</span> quam. Nulla sed tristique turpis. </p>
            <div class="banner_search_box">
                <form action="{{route('front.directory')}}">
                    <input class="banner_search_field" placeholder="Search an Expert" type="text" name="search">
                    <input class="banner_search_btn parimary_btn green_btn" type="submit" value="Search Now" name="">
                </form>
            </div>
        </div>
    </div>
</section>
<!-- banner_section -->


<section class="how_it_work_section">
    <div class="container position-relative">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">How It Works</h2>
            <p class="proxima_light">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>

        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="how_it_work_img">
                    <img src="{{asset('front/images/how-it-work.png')}}">
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="how_it_work_content">
                    <h2 class="proxima_black green"><strong class="darkblue">Learn A</strong><br>Skillset <sub class="darkblue">In</sub><br><span class="black"><b class="golden">10</b> Minutes</span></h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p>
                    <div class="our_process_wrap">
                        <div class="row">
                            <div class="col-3">
                                <div class="our_process_item">
                                    <div class="our_process_img">
                                        <img src="{{asset('front/images/sign_up.png')}}">
                                    </div>
                                    <h4 class="text-uppercase proxima_exbold black">Sign Up</h4>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="our_process_item">
                                    <div class="our_process_img">
                                        <img src="{{asset('front/images/search_expart.png')}}">
                                    </div>
                                    <h4 class="text-uppercase proxima_exbold black">Search Expert</h4>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="our_process_item">
                                    <div class="our_process_img">
                                        <img src="{{asset('front/images/join-class.png')}}">
                                    </div>
                                    <h4 class="text-uppercase proxima_exbold black">Join a Class</h4>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="our_process_item">
                                    <div class="our_process_img">
                                        <img src="{{asset('front/images/learn_enjoy.png')}}">
                                    </div>
                                    <h4 class="text-uppercase proxima_exbold black">Learn & Enjoy</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('front.about-us')}}" class="parimary_btn darkblue_btn">Know More</a>
                </div>
            </div>
        </div>

        <div class="how_ite_works_plane">
            <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
        </div>
    </div>			
</section>
<!-- how_it_work_section -->

<section class="mentors_section">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase white">Choose the best Mentors for you</h2>
            <p class="white proxima_light">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>

        <ul class="mentor_tab_menu tabs_menu">
            @foreach ($data->categories as $key => $category)
                <li><a href="#category-{{$key+1}}" id="{{$category->id}}">{{$category->name}}</a></li>
            @endforeach
        </ul>

        <div class="mentor_tab_content_wrap">
            @foreach ($data->courses as $key => $courses)
            <div class="tab_content" id="category-{{$key+1}}">
                <div class="mentors_slider owl-carousel owl-theme">
                    @forelse ($courses as $course)
                    <div class="mentor_course">
                        <div class="mentor_course_img">
                            <img src="{{asset($course->image)}}">
                            <div class="mentor_course_overlay">
                                <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">{{substr($course->name, 0, 7)}}</sub>{{substr($course->name, 7,11)}} </h4>
                                <h3 class="green proxima_exbold text-uppercase">{{substr($course->name, 18,14)}}</h3>
                                <ul>
                                    <li class="mentor_time"><img src="{{asset('front/images/time_icon.png')}}"> {{$course->duration}} minutes</li>
                                    <li class="mentor_price" id="slot_modal" data-mentor="{{$course->teacherDetail->id}}" data-course="{{$course->id}}" data-toggle="modal" data-target="#exampleModal">{{$course->price}}$ <span>Only</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="mentor_course_content">
                            <div class="mentor_course_review">
                                <div class="mentor_course_review_img">
                                    <img src="{{asset($course->teacherDetail->image)}}">
                                </div>
                                <div class="mentor_course_review_name">
                                    <h5>{{$course->teacherDetail->name}}</h5>
                                    <h6>{{$course->teacherDetail->short_description}}</h6>
                                </div>
                            </div>
                            <p>{{$course->description}}</p>
                            <ul>
                                <li><a href="javascript:void(0);">Consult Now</a></li>
                                <li><a href="{{route('front.experts', ['expertId' => $course->teacherDetail->id])}}">Visit Profile</a></li>
                            </ul>
                        </div>
                    </div>
                    @empty
                    <h4 class="proxima_black text-uppercase white text-center">Sorry! No data</h4>
                    @endforelse						
                </div>	
            </div>
            @endforeach
        </div>

        <div class="text-center view_all_mentor">
            <a href="javascript:void(0);" class="green_btn parimary_btn">View Available Mentors</a>
        </div>
    </div>
    <div class="mentors_section_plane">
        <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
    </div>
</section>

<!-- Calendar Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Choose Slot</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @include('front.calendar')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Book Slot</button>
        </div>
      </div>
    </div>
</div>
<!-- mentors_section -->

<section class="review_section">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">Reviews & Feedbacks</h2>
            <p class="darkgray proxima_light">Greater Pittsburgh's Expert Basement Waterproofing & Foundation Repair Contractor</p>
        </div>

        <div class="review_slider_wrap position-relative">
            <div class="review_slider owl-carousel owl-theme">
                @foreach ($data->testimonials as $testimonial)
                <div class="review_slider_item">
                    <div class="review_slider_item_left">
                        <p>{!!$testimonial->quote!!}</p>

                        <div class="review_person">
                            <div class="review_person_img align-self-center">
                                <img src="{{asset($testimonial->image)}}">
                            </div>
                            <div class="review_person_details align-self-center">
                                <h4 class="text-uppercase darkblue proxima_exbold">{{$testimonial->name}}</h4>
                                <h5 class="text-uppercase darkgray">{{$testimonial->designation}}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="review_slider_item_right">
                        <div class="class_teacher_description align-self-center">								
                            <h3 class="text-uppercase white">Total <span class="golden">120+</span> <br><b>Classes</b></h3>
                            <div class="class_teacher_name">
                                <h4 class="white proxima_exbold">{{$testimonial->teacherDetails->name}}</h4>
                                <h5 class="text-uppercase white proxima_exbold">MUSIC TRICKS</h5>
                                <img src="{{asset('front/images/reviews_star.png')}}">
                                <a class="secondary_btn green_btn" href="{{route('front.experts', ['expertId' => $testimonial->teacherDetails->id])}}">More Classes</a>
                            </div>
                        </div>
                        <div class="class_teacher_img_wrap position-relative align-self-center">
                            <div class="class_teacher_img">
                                <img src="{{asset($testimonial->teacherDetails->image)}}">
                            </div>							
                        </div>							
                    </div>
                </div>
                @endforeach
            </div>
            <div class="review_slider_plane">
                <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
            </div>
        </div>

        <div class="text-center">
            <a href="javascript:void(0);" class="parimary_btn darkblue_btn">READ ALL REVIEWS</a>
        </div>
    </div>
    <span class="review_yellow_plane"><img class="img-fluid" src="{{asset('front/images/yellow-plane.png')}}"></span>
</section>
<!-- review_section -->

<section class="become_member_section position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 align-self-center">
                <div class="become_member_device">
                    <img class="img-fluid" src="{{asset('front/images/member-device.png')}}">
                </div>
            </div>
            <div class="col-lg-4 align-self-center">
                <div class="become_member_content">
                    <h2 class="darkblue text-uppercase">Let’s <b class="proxima_exbold">Become a</b> <span class="green proxima_exbold">Mentor</span></h2>
                    <p class="darkgray proxima_light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    <a href="{{route('front.sign-up',['userType' => 2])}}" class="parimary_btn darkblue_btn">Start Mentoring Today</a>
                </div>
            </div>
        </div>
    </div>
    <span class="member_yellow_plane"><img class="img-fluid" src="{{asset('front/images/member-plane.png')}}"></span>
</section>
<!-- become_member_section -->


<section class="recent_article_section">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase white">Recent Articles</h2>
            <p class="white proxima_light">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>

        <div class="row justify-content-center">
            @foreach ($data->articles as $article)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="recent_article_item">
                    <div class="recent_article_img">
                        <a class="d-block" href="#">
                            <img src="{{asset($article->image)}}">
                        </a>
                    </div>
                    <div class="recent_article_des">
                        <span class="article_date proxima_bold">{{date('d M,Y', strtotime($article->created_at))}}</span>
                        <h3 class="proxima_exbold"><a class="d-block" href="#">{{$article->title}}</a></h3>
                        <p class="darkgray">{{$article->description}}</p>
                        <a href="{{route('front.articles', ['articleId' => $article->id])}}" class="secondary_btn darkblue_btn">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center view_all_mentor explore_all_article">
            <a href="javascript:void(0);" class="green_btn parimary_btn">Explore All</a>
        </div>
    </div>
</section>
<!-- recent_article_section -->
@endsection

@section('script')
{{-- <script>
    let d = new Date();
    month = ['Jan','Feb','March','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    week = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    thisWeek = d.getDay();
    thisMonth = d.getMonth();
    thisYear = d.getFullYear();
    function daysInMonth (month, year) {
        return new Date(year, month, 0).getDate();
    }
    days = daysInMonth(thisMonth, thisYear);
    $('.weeks').empty();
    $('.dates').empty();
    totalWeek = thisWeek+6;
    for (let index = thisWeek; index <= totalWeek; index++) {
        weekDay = '<div class="days">'+week[index]+'</div>';
        if(totalWeek > 6) {
            // weekDay = '<div class="days">'+week[totalWeek-index]+'</div>';
        }
        $('.weeks').append(weekDay);
    }
    for (let index = 0; index < 35; index++) {
        dates = '<div class="date-boxes">'+(index+1)+'</div>';
        if(index >= days) {
            dates = '<div class="date-boxes inactive">'+((index-days)+1)+'</div>';
        }
        $('.dates').append(dates);
    }
    
    console.log(month[thisMonth-1]);
    console.log(days);
</script> --}}
<script>
    let d = new Date();
    thisWeek = d.getDay();
    thisMonth = d.getMonth();
    thisYear = d.getFullYear();
    $("#slot_modal").click(function() {
        mentorId = $(this).data('mentor');
        courseId = $(this).data('course');
    })
</script>
@endsection