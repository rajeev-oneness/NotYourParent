@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Experts
@endsection

@section('content')
<!-- featured expert starts -->
<section class="featured_experts">
    <div class="container">
        <div class="featured_experts_left">
            <div class="jenny_status">
                <div class="online"><span class="active"></span> <a class="text-uppercase darkblue" href="javascript:void(0);">online</a> </div>
                
                <a class="darkblue proxima_exbold verified" href="javascript:void(0);">{{($teacher->is_verified == 1)? 'Verified' : 'Not Verified'}}</a>
            </div>
            <h1 class="proxima_exbold darkblue text-uppercase">{{$teacher->name}}</h1>
            @foreach ($topics as $topic)
                <h3 class="golden designation">{{$topic->topicDetail->name}}</h3>
            @endforeach
            <h3 class="proxima_exbold black">TOTAL <span class="golden">120+</span> CLASSES <span style="color: #e76f37;">4.5</span> <span class="proxima_normal" style="color: #003456;">Ratings</span></h3>
            <h3 style="color: #003456;"><span class="darkblue proxima_exbold">34,598</span> Students</h3>
            <h6 class="darkblue text-uppercase proxima_bold">Regular sessions</h6>

            <div class="calender">
                <div class="calender_left">
                    <div class="calender_heading">
                        <h4 class="proxima_exbold black">May <span class="green">2021</span></h4>
                        <ul>
                            <li><a href="#"><img src="{{asset('front/images/blue-arrow-left.png')}}" alt=""></a></li>
                            <li><a href="#"><img src="{{asset('front/images/blue-arrow-right.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="calendar-table">
                        <div class="weeks">
                            <div class="days">S</div>
                            <div class="days">M</div>
                            <div class="days">T</div>
                            <div class="days">W</div>
                            <div class="days">T</div>
                            <div class="days">F</div>
                            <div class="days">S</div>
                        </div>
                        <div class="dates">
                            <div class="date-boxes inactive">29</div>
                            <div class="date-boxes inactive">30</div>
                            <div class="date-boxes inactive">31</div>
                            <div class="date-boxes">01</div>
                            <div class="date-boxes">02</div>
                            <div class="date-boxes">03</div>
                            <div class="date-boxes">04</div>
                            <div class="date-boxes">05</div>
                            <div class="date-boxes">06</div>
                            <div class="date-boxes">07</div>
                            <div class="date-boxes">08</div>
                            <div class="date-boxes">09</div>
                            <div class="date-boxes">10</div>
                            <div class="date-boxes">11</div>
                            <div class="date-boxes">12</div>
                            <div class="date-boxes">13</div>
                            <div class="date-boxes">14</div>
                            <div class="date-boxes">15</div>
                            <div class="date-boxes">16</div>
                            <div class="date-boxes">17</div>
                            <div class="date-boxes">18</div>
                            <div class="date-boxes">19</div>
                            <div class="date-boxes">20</div>
                            <div class="date-boxes">21</div>
                            <div class="date-boxes">22</div>
                            <div class="date-boxes">23</div>
                            <div class="date-boxes">24</div>
                            <div class="date-boxes">25</div>
                            <div class="date-boxes">26</div>
                            <div class="date-boxes">27</div>
                            <div class="date-boxes">28</div>
                            <div class="date-boxes">29</div>
                            <div class="date-boxes">30</div>
                            <div class="date-boxes inactive">01</div>
                            <div class="date-boxes inactive">02</div>
                        </div>
                    </div>
                </div>
                <div class="calender_right">
                    <h5 class="white">WEDNESDAY MAY 15<sup>th</sup></h5>
                    <ul class="times">
                        <li>7:00am - 7:15am</li>
                        <li>7:30am - 7:45am</li>
                        <li>8:15am - 8:30am</li>
                        <li>9:00am - 9:15am</li>
                        <li>9:45am - 10:00am</li>
                        <li>4:00pm - 4:15pm</li>
                        <li>4:45pm - 5:00pm</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="featured_experts_right">
            <div class="img-container">
                <img src="{{asset('front/images/testimonial-image-female.jpg')}}" alt="">
            </div>
            <div class="footer_social">
                <ul>
                    <li><a href="{{($teacher->linkedin_url != '')?$teacher->linkedin_url:'javascript:void(0);'}}"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="{{($teacher->fb_url != '')?$teacher->fb_url:'javascript:void(0);'}}"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="{{($teacher->twitter_url != '')?$teacher->twitter_url:'javascript:void(0);'}}"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{{($teacher->instagram_url != '')?$teacher->instagram_url:'javascript:void(0);'}}"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            <h6 class="darkblue text_uupercase proxima_exbold">BIO</h6>
            <p>{!!$teacher->bio!!}</p>
        </div>
    </div>
</section>
<!-- featured experts ends  -->



<!-- my sessions starts  -->
<section id="my_sessions">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">My sessions (<span class="golden">26</span>)</h2>
            <p class="darkgray proxima_light">Greater Pittsburgh's Expert Basement Waterproofing & Foundation Repair
                Contractor</p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="mentor_course">
                    <div class="mentor_course_img">
                        <img src="{{asset('front/images/mentor-img-1.jpg')}}">
                        <div class="mentor_course_overlay">
                            <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">Let’s</sub>
                                Learn some</h4>
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
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum.Ipsum is simply dummy text of the printing.</p>
                        <ul>
                            <li><a href="javascript:void(0);">Consult Now</a></li>
                            <li><a href="javascript:void(0);">Visit Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="mentor_course">
                    <div class="mentor_course_img">
                        <img src="{{asset('front/images/mentor-img-2.jpg')}}">
                        <div class="mentor_course_overlay">
                            <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">Let’s</sub>
                                Learn some</h4>
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
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum.Ipsum is simply dummy text of the printing.</p>
                        <ul>
                            <li><a href="javascript:void(0);">Consult Now</a></li>
                            <li><a href="javascript:void(0);">Visit Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="mentor_course">
                    <div class="mentor_course_img">
                        <img src="{{asset('front/images/mentor-img-3.jpg')}}">
                        <div class="mentor_course_overlay">
                            <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">Let’s</sub>
                                Learn some</h4>
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
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum.Ipsum is simply dummy text of the printing.</p>
                        <ul>
                            <li><a href="javascript:void(0);">Consult Now</a></li>
                            <li><a href="javascript:void(0);">Visit Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="mentor_course">
                    <div class="mentor_course_img">
                        <img src="{{asset('front/images/mentor-img-3.jpg')}}">
                        <div class="mentor_course_overlay">
                            <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">Let’s</sub>
                                Learn some</h4>
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
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum.Ipsum is simply dummy text of the printing.</p>
                        <ul>
                            <li><a href="javascript:void(0);">Consult Now</a></li>
                            <li><a href="javascript:void(0);">Visit Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="mentor_course">
                    <div class="mentor_course_img">
                        <img src="{{asset('front/images/mentor-img-1.jpg')}}">
                        <div class="mentor_course_overlay">
                            <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">Let’s</sub>
                                Learn some</h4>
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
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum.Ipsum is simply dummy text of the printing.</p>
                        <ul>
                            <li><a href="javascript:void(0);">Consult Now</a></li>
                            <li><a href="javascript:void(0);">Visit Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="mentor_course">
                    <div class="mentor_course_img">
                        <img src="{{asset('front/images/mentor-img-2.jpg')}}">
                        <div class="mentor_course_overlay">
                            <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">Let’s</sub>
                                Learn some</h4>
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
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum.Ipsum is simply dummy text of the printing.</p>
                        <ul>
                            <li><a href="javascript:void(0);">Consult Now</a></li>
                            <li><a href="javascript:void(0);">Visit Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="explore_all text-center">
            <a href="javascript:void(0);" class="parimary_btn green_btn">explore all</a>
        </div>
    </div>
</section>
<!-- my sessions ends  -->

<section class="experts_testimonials ">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase white">what people says about {{$teacher->name}}</h2>
            <p class="darkgray proxima_light white">Greater Pittsburgh's Expert Basement Waterproofing & Foundation
                Repair Contractor</p>
        </div>

        
        <div class="review_slider_wrap position-relative">
            <div class="review_slider owl-carousel owl-theme">
                @forelse ($testimonials as $testimonial)
                <div class="review_slider_item">
                    <div class="review_slider_item_left">
                        <p>{!!$testimonial->quote!!}</p>

                        <div class="review_person">
                            <div class="review_person_img align-self-center">
                                <img src="{{asset($testimonial->image)}}">
                            </div>
                            <div class="review_person_details align-self-center">
                                <h4 class="text-uppercase darkblue proxima_exbold">{{$testimonial->name}}</h4>
                                <h5 class="text-uppercase white">{{$testimonial->designation}}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="review_slider_item_right bg-gray">
                        <div class="class_teacher_description align-self-center">
                            <h3 class="text-uppercase darkblue">Total <span class="golden">120+</span>
                                <br><b>Classes</b></h3>
                            <div class="class_teacher_name">
                                <h4 class="darkblue proxima_exbold">{{$testimonial->teacherDetails->name}}</h4>
                                @foreach ($topics as $topic)
                                    <h5 class="text-uppercase darkblue proxima_exbold">{{$topic->topicDetail->name}}, </h5>
                                @endforeach
                                <img src="{{asset('front/images/reviews_star.png')}}">
                            </div>
                        </div>
                        <div class="class_teacher_img_wrap experts_img_wrap position-relative align-self-center">
                            <div class="class_teacher_img">
                                <img src="{{asset($testimonial->teacherDetails->image)}}">
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <h4 class="proxima_black text-uppercase white text-center">oops ! No testimonial found</h4>
                @endforelse
            </div>
        </div>    

        <div class="text-center">
            <a href="javascript:void(0);" class="parimary_btn green_btn">explore all</a>
        </div>
        <div class="experts_testimonials_plane">
            <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
        </div>
    </div>
</section>

@endsection

@section('script')
    
@endsection