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
                    <a href="#" class="parimary_btn darkblue_btn">Know More</a>
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
            <li><a href="#Musictricks">Music Tricks</a></li>
            <li><a href="#Cookingtrick">Cooking Tricks</a></li>
            <li><a href="#Photography">Photography</a></li>
            <li><a href="#Tailoring">Tailoring</a></li>
        </ul>

        <div class="mentor_tab_content_wrap">
            <div class="tab_content" id="Musictricks">
                <div class="mentors_slider owl-carousel owl-theme">
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

                    <div class="mentor_course">
                        <div class="mentor_course_img">
                            <img src="{{asset('front/images/mentor-img-2.jpg')}}">
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

                    <div class="mentor_course">
                        <div class="mentor_course_img">
                            <img src="{{asset('front/images/mentor-img-3.jpg')}}">
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
                    <div class="mentor_course">
                        <div class="mentor_course_img">
                            <img src="{{asset('front/images/mentor-img-3.jpg')}}">
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
                </div>	
            </div>

            <div class="tab_content" id="Cookingtrick">	
                <div class="mentors_slider owl-carousel owl-theme">
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

                    <div class="mentor_course">
                        <div class="mentor_course_img">
                            <img src="{{asset('front/images/mentor-img-2.jpg')}}">
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

                    <div class="mentor_course">
                        <div class="mentor_course_img">
                            <img src="{{asset('front/images/mentor-img-3.jpg')}}">
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
                    <div class="mentor_course">
                        <div class="mentor_course_img">
                            <img src="{{asset('front/images/mentor-img-3.jpg')}}">
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
                </div>				
            </div>

            <div class="tab_content" id="Photography">
                <div class="mentors_slider owl-carousel owl-theme">
                    <div class="mentor_course">
                        <div class="mentor_course_img">
                            <img src="{{asset('front/images/mentor-img-1.jpg')}}">
                            <div class="mentor_course_overlay">
                                <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">Let’s</sub> Learn some</h4>
                                <h3 class="green proxima_exbold text-uppercase">Lorem Ipsum 1</h3>
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

                    <div class="mentor_course">
                        <div class="mentor_course_img">
                            <img src="{{asset('front/images/mentor-img-2.jpg')}}">
                            <div class="mentor_course_overlay">
                                <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">Let’s</sub> Learn some</h4>
                                <h3 class="green proxima_exbold text-uppercase">Lorem Ipsum 2</h3>
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

                    <div class="mentor_course">
                        <div class="mentor_course_img">
                            <img src="{{asset('front/images/mentor-img-3.jpg')}}">
                            <div class="mentor_course_overlay">
                                <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">Let’s</sub> Learn some</h4>
                                <h3 class="green proxima_exbold text-uppercase">Lorem Ipsum 3</h3>
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
                    <div class="mentor_course">
                        <div class="mentor_course_img">
                            <img src="{{asset('front/images/mentor-img-3.jpg')}}">
                            <div class="mentor_course_overlay">
                                <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">Let’s</sub> Learn some</h4>
                                <h3 class="green proxima_exbold text-uppercase">Lorem Ipsum 4</h3>
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
                </div>					
            </div>

            <div class="tab_content" id="Tailoring">
                <div class="mentors_slider owl-carousel owl-theme">
                    <div class="mentor_course">
                        <div class="mentor_course_img">
                            <img src="{{asset('front/images/mentor-img-1.jpg')}}">
                            <div class="mentor_course_overlay">
                                <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">Let’s</sub> Learn some</h4>
                                <h3 class="green proxima_exbold text-uppercase">Lorem Ipsum 2</h3>
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

                    <div class="mentor_course">
                        <div class="mentor_course_img">
                            <img src="{{asset('front/images/mentor-img-2.jpg')}}">
                            <div class="mentor_course_overlay">
                                <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">Let’s</sub> Learn some</h4>
                                <h3 class="green proxima_exbold text-uppercase">Lorem Ipsum 3</h3>
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

                    <div class="mentor_course">
                        <div class="mentor_course_img">
                            <img src="{{asset('front/images/mentor-img-3.jpg')}}">
                            <div class="mentor_course_overlay">
                                <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">Let’s</sub> Learn some</h4>
                                <h3 class="green proxima_exbold text-uppercase">Lorem Ipsum 4</h3>
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
                    <div class="mentor_course">
                        <div class="mentor_course_img">
                            <img src="{{asset('front/images/mentor-img-3.jpg')}}">
                            <div class="mentor_course_overlay">
                                <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">Let’s</sub> Learn some</h4>
                                <h3 class="green proxima_exbold text-uppercase">Lorem Ipsum 5</h3>
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
                </div>				
            </div>
        </div>

        <div class="text-center view_all_mentor">
            <a href="#" class="green_btn parimary_btn">View Available Mentors</a>
        </div>
    </div>
    <div class="mentors_section_plane">
        <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
    </div>
</section>
<!-- mentors_section -->

<section class="review_section">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">Reviews & Feedbacks</h2>
            <p class="darkgray proxima_light">Greater Pittsburgh's Expert Basement Waterproofing & Foundation Repair Contractor</p>
        </div>

        <div class="review_slider_wrap position-relative">
            <div class="review_slider owl-carousel owl-theme">
                <div class="review_slider_item">
                    <div class="review_slider_item_left">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, </p>

                        <div class="review_person">
                            <div class="review_person_img align-self-center">
                                <img src="{{asset('front/images/testimonial-image-female.jpg')}}">
                            </div>
                            <div class="review_person_details align-self-center">
                                <h4 class="text-uppercase darkblue proxima_exbold">Robin Wise</h4>
                                <h5 class="text-uppercase darkgray">Charlotte, NC</h5>
                            </div>
                        </div>
                    </div>

                    <div class="review_slider_item_right">
                        <div class="class_teacher_description align-self-center">								
                            <h3 class="text-uppercase white">Total <span class="golden">120+</span> <br><b>Classes</b></h3>
                            <div class="class_teacher_name">
                                <h4 class="white proxima_exbold">Johnathon Doe</h4>
                                <h5 class="text-uppercase white proxima_exbold">MUSIC TRICKS</h5>
                                <img src="{{asset('front/images/reviews_star.png')}}">
                                <a class="secondary_btn green_btn" href="#">More Classes</a>
                            </div>
                        </div>
                        <div class="class_teacher_img_wrap position-relative align-self-center">
                            <div class="class_teacher_img">
                                <img src="{{asset('front/images/reviews_class_master.jpg')}}">
                            </div>							
                        </div>							
                    </div>
                </div>
                <div class="review_slider_item">
                    <div class="review_slider_item_left">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, </p>

                        <div class="review_person">
                            <div class="review_person_img align-self-center">
                                <img src="{{asset('front/images/testimonial-image-female.jpg')}}">
                            </div>
                            <div class="review_person_details align-self-center">
                                <h4 class="text-uppercase darkblue proxima_exbold">Robin Wise</h4>
                                <h5 class="text-uppercase darkgray">Charlotte, NC</h5>
                            </div>
                        </div>
                    </div>

                    <div class="review_slider_item_right">
                        <div class="class_teacher_description align-self-center">								
                            <h3 class="text-uppercase white">Total <span class="golden">120+</span> <br><b>Classes</b></h3>
                            <div class="class_teacher_name">
                                <h4 class="white proxima_exbold">Johnathon Doe</h4>
                                <h5 class="text-uppercase white proxima_exbold">MUSIC TRICKS</h5>
                                <img src="{{asset('front/images/reviews_star.png')}}">
                                <a class="secondary_btn green_btn" href="#">More Classes</a>
                            </div>
                        </div>
                        <div class="class_teacher_img_wrap position-relative align-self-center">
                            <div class="class_teacher_img">
                                <img src="{{asset('front/images/reviews_class_master.jpg')}}">
                            </div>							
                        </div>							
                    </div>
                </div>
            </div>
            <div class="review_slider_plane">
                <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
            </div>
        </div>

        <div class="text-center">
            <a href="#" class="parimary_btn darkblue_btn">READ ALL REVIEWS</a>
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
                    <a href="#" class="parimary_btn darkblue_btn">Start Mentoring Today</a>
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
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="recent_article_item">
                    <div class="recent_article_img">
                        <a class="d-block" href="#">
                            <img src="{{asset('front/images/recent-article-img-1.jpg')}}">
                        </a>
                    </div>
                    <div class="recent_article_des">
                        <span class="article_date proxima_bold">18 Dec,2020</span>
                        <h3 class="proxima_exbold"><a class="d-block" href="#">It is a long established fact that a reader will be distracted</a></h3>
                        <p class="darkgray">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        <a href="#" class="secondary_btn darkblue_btn">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="recent_article_item">
                    <div class="recent_article_img">
                        <a class="d-block" href="#">
                            <img src="{{asset('front/images/recent-article-img-2.jpg')}}">
                        </a>
                    </div>
                    <div class="recent_article_des">
                        <span class="article_date proxima_bold">18 Dec,2020</span>
                        <h3 class="proxima_exbold"><a class="d-block" href="#">It is a long established fact that a reader will be distracted</a></h3>
                        <p class="darkgray">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        <a href="#" class="secondary_btn darkblue_btn">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="recent_article_item">
                    <div class="recent_article_img">
                        <a class="d-block" href="#">
                            <img src="{{asset('front/images/recent-article-img-3.jpg')}}">
                        </a>
                    </div>
                    <div class="recent_article_des">
                        <span class="article_date proxima_bold">18 Dec,2020</span>
                        <h3 class="proxima_exbold"><a class="d-block" href="#">It is a long established fact that a reader will be distracted</a></h3>
                        <p class="darkgray">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        <a href="#" class="secondary_btn darkblue_btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center view_all_mentor explore_all_article">
            <a href="#" class="green_btn parimary_btn">Explore All</a>
        </div>
    </div>
</section>
<!-- recent_article_section -->
@endsection

@section('script')
    
@endsection