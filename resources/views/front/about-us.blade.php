@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    About Us
@endsection

@section('content')
<section class="inner_banner_section resource_banner about_banner" style="background-image: url({{asset('front/images/about-banner.jpg')}});">
    <div class="container">					
        <div class="resource_banner_content about_banner_content">
            <h1 class="text-uppercase darkblue proxima_bold">SOMETHING <br><span class="proxima_black golden">INTERESTING</span><br><b class="proxima_black">ABOUT US</b></h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially</p>
        </div>
    </div>
</section>
<!-- banner_section -->



<section class="mentors_section about_mentors_section">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">Mentors for you</h2>
            <p class="darkgray proxima_light">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
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

<section class="faq_section">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">FREQUENTLY ASKED QUESTIONS</h2>
            <p class="darkgray proxima_light">Greater Pittsburgh's Expert Basement Waterproofing & Foundation Repair Contractor</p>
        </div>

        <div class="hotel_item_accordian">
            <h3 class="accordian_heading faq_accordian_heading darkblue proxima_exbold">When should I start?  </h3>
            <div class="accordian_details faq_accordian_details">
                <div class="table-responsive rooms_table_wrap">
                    <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
                </div>
            </div>
        </div>
        <div class="hotel_item_accordian">
            <h3 class="accordian_heading faq_accordian_heading darkblue proxima_exbold">How much does it cost?</h3>
            <div class="accordian_details faq_accordian_details">
                <div class="table-responsive rooms_table_wrap">
                    <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
                </div>
            </div>
        </div>
        <div class="hotel_item_accordian">
            <h3 class="accordian_heading faq_accordian_heading darkblue proxima_exbold">Time Commitment</h3>
            <div class="accordian_details faq_accordian_details">
                <div class="table-responsive rooms_table_wrap">
                    <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
                </div>
            </div>
        </div>
    </div>
</section>

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

<section class="recent_article_section about_recent_article_section">
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