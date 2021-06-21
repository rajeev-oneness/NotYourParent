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
                <div class="expart_search_top">
                    <div class="expart_search_grid">
                        <label>Topic</label>
                        <select>
                            <option>Music & Instruments</option>
                            <option>Select 1</option>
                            <option>Select 2</option>
                            <option>Select 3</option>
                            <option>Select 4</option>
                        </select>
                    </div>
                    <div class="expart_search_grid">
                        <label>Available</label>
                        <select>
                            <option>Now</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="expart_search_grid">
                        <label>Seniority</label>
                        <select>
                            <option>1 Years +</option>
                            <option>2 Years +</option>
                            <option>3 Years +</option>
                            <option>4 Years +</option>
                            <option>5 Years +</option>
                            <option>6 Years +</option>
                            <option>7 Years +</option>
                        </select>
                    </div>
                    <button class="search_icon_top">
                        <img src="{{asset('front/images/search_icon.png')}}" alt="">
                    </button>
                </div>
                <div class="expart_search_bottom">
                    <span class="proxima_black darkblue text-uppercase">or</span>
                    <input type="text" placeholder="Search an Expert via Name" name="">
                    <button class="search_icon_bottom">
                        <img src="{{asset('front/images/search_icon.png')}}" alt="">
                    </button>
                </div>
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
            <h3 class="proxima_normal darkblue"><span class="text-uppercase proxima_exbold">9 SESSIONS</span> Available Now</h3>
        </div>
        <div class="row">
            <div class="col-lg-4">
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
            </div>
            <div class="col-lg-4">
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
            </div>
            <div class="col-lg-4">
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
            <div class="col-lg-4">
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
            <div class="col-lg-4">
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
            </div>
            <div class="col-lg-4">
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
            </div>
            <div class="col-lg-4">
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
            </div>
            <div class="col-lg-4">
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
            </div>
            <div class="col-lg-4">
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
    </div>
    <div class="mentors_section_plane">
        <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
    </div>
</section>
<!-- mentors_section -->

@endsection

@section('script')
    
@endsection