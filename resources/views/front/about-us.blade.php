@extends('front.layouts.master')

@section('head-script-style')
@endsection

@section('title')
    About Us
@endsection

@section('content')
<section class="inner_banner_section resource_banner about_banner" style="background-image: url({{asset($settings->image)}});">
    <div class="container">
        <div class="resource_banner_content about_banner_content">
            <h1 class="text-uppercase darkblue proxima_bold">{{explodeCust($settings->heading)}} <br><span class="proxima_black golden">{{explodeCust($settings->heading, 1)}}</span><br><b class="proxima_black">{{explodeCust($settings->heading, 2).' '.explodeCust($settings->heading, 3)}}</b></h1>
            <p>{{$settings->description}}</p>
        </div>
    </div>
</section>

<section class="mentors_section about_mentors_section">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">Experts for you</h2>
            <p class="darkgray proxima_light">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
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
                                <h4 class="white proxima_exbold text-uppercase mb-5"><sub class="proxima_normal">{{substr($course->name, 0, 80)}}</sub></h4>
                                {{-- <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">{{substr($course->name, 0, 7)}}</sub>{{substr($course->name, 7,11)}} </h4> --}}
                                {{-- <h3 class="green proxima_exbold text-uppercase">{{substr($course->name, 18,14)}}</h3> --}}
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
                            <p style="max-height: 72px;">{{words($course->description, 20)}}</p>
                            <ul>
                                <li><a href="javascript:void(0);">Consult Now</a></li>
                                <li><a href="{{route('front.experts.single', ['expertId' => $course->teacherDetail->id])}}">Visit Profile</a></li>
                            </ul>
                        </div>
                    </div>
                    @empty
                    <h4 class="proxima_black text-uppercase white text-center">No courses found !</h4>
                    @endforelse
                </div>	
            </div>
            @endforeach
        </div>

        <div class="text-center view_all_mentor">
            <a href="{{route('front.experts')}}" class="green_btn parimary_btn">View Available Experts</a>
        </div>
    </div>
    <div class="mentors_section_plane">
        <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
    </div>
</section>

<section class="faq_section">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">FREQUENTLY ASKED QUESTIONS</h2>
            <p class="darkgray proxima_light">Greater Pittsburgh's Expert Basement Waterproofing & Foundation Repair Contractor</p>
        </div>

        <div class="hotel_item_accordian">
            @foreach ($faq_data as $item)
            <h3 class="accordian_heading faq_accordian_heading darkblue proxima_exbold">{{ $item->title }}</h3>
            <div class="accordian_details faq_accordian_details">
                <div class="table-responsive rooms_table_wrap">
                    <p>{{ $item->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        {{-- <div class="hotel_item_accordian">
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
        </div> --}}
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

<section class="recent_article_section about_recent_article_section">
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
                        <a class="d-block" href="{{route('front.articles.single', ['articleId' => $article->id])}}">
                            <img src="{{asset($article->image)}}">
                        </a>
                    </div>
                    <div class="recent_article_des">
                        <span class="article_date proxima_bold">{{date('d M,Y', strtotime($article->created_at))}}</span>
                        <h3 class="proxima_exbold"><a class="d-block" href="#">{{$article->title}}</a></h3>
                        <p class="darkgray">{{$article->description}}</p>
                        <a href="{{route('front.articles.single', ['articleId' => $article->id])}}" class="secondary_btn darkblue_btn">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center view_all_mentor explore_all_article">
            <a href="{{route('front.articles')}}" class="green_btn parimary_btn">Explore All</a>
        </div>
    </div>
</section>
<!-- recent_article_section -->
@endsection

@section('script')
    
@endsection