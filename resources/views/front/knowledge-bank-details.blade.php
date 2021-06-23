@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Knowledge Bank Details
@endsection

@section('content')

<!-- Knowledge Bank Section starts  -->
<section class="how_it_work_section" id="knowledge_bank">
    <div class="container position-relative">
        <div class="knowledge_bank_details">
            <div class="detail_text">
                <h1 class="text-uppercase darkblue proxima_exbold">Lorem ipsum dolor sit amet consectetur
                    adipisicing elit.</h1>
                <h6 class="text-uppercase golden proxima_bold">Free for first time subscriptions</h6>
                <p class="darkgray">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                    of type and scrambled it to make a type specimen book.
                </p>
                <p class="darkgray">
                    Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem
                    nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan
                    ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat
                    consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                    per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit
                    amet a augue. But also the leap into electronic typesetting, remaining essentially.
                </p>
            </div>
            <div class="bullets">
                <h5 class="black proxima_exbold">Who is this for?</h5>
                <ul class="darkblue proxima_exbold">
                    <li>It's a long established fact that a reader will be distracted</li>
                    <li>Established fact that a reader</li>
                    <li>Long established fact that a reader</li>
                </ul>
            </div>
            <div class="bullets">
                <h5 class="black proxima_exbold">What you'll learn:</h5>
                <ul class="darkblue proxima_exbold">
                    <li>It's a long established fact that a reader will be distracted</li>
                    <li>Established fact that a reader</li>
                    <li>Long established fact that a reader</li>
                </ul>
            </div>
            <div class="course_details">
                <h5 class="black proxima_exbold">Course Details:</h5>
                <ul class="golden proxima_exbold">
                    <li>8 Lessons</li>
                    <li>34 Videos</li>
                    <li>8 Quizzes</li>
                    <li>4:12 Hours</li>
                </ul>
            </div>
            <video controls>
                <source src="{{asset('front/video/video.mp4')}}">
            </video>
        </div>
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">More like this</h2>
            <p class="proxima_light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore suscipit
                officia necessitatibus saepe! dolores voluptates praesentium.</p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="darkblue clearfix knowledge_bank_cards">
                    <div class="white new text-uppercase text-center">new</div>
                    <h3 class="proxima_bold">Lorem Ipsum Dolor</h3>
                    <h6 class="proxima_bold">Morbi consequat semper nunc mollis accumsun enim</h6>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, sint debitis eius odit
                        voluptatem amet mollitia?</p>
                    <a class="golden proxima_bold" href="#">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="darkblue clearfix knowledge_bank_cards">
                    <div class="white new text-uppercase text-center">new</div>
                    <h3 class="proxima_bold">Lorem Ipsum Dolor</h3>
                    <h6 class="proxima_bold">Morbi consequat semper nunc mollis accumsun enim</h6>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, sint debitis eius odit
                        voluptatem amet mollitia?</p>
                    <a class="golden proxima_bold" href="#">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="darkblue clearfix knowledge_bank_cards">
                    <div class="white new text-uppercase text-center">new</div>
                    <h3 class="proxima_bold">Lorem Ipsum Dolor</h3>
                    <h6 class="proxima_bold">Morbi consequat semper nunc mollis accumsun enim</h6>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, sint debitis eius odit
                        voluptatem amet mollitia?</p>
                    <a class="golden proxima_bold" href="#">Read More</a>
                </div>
            </div>

        </div>

        <div class="how_ite_works_plane">
            <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
        </div>
    </div>
</section>
<!-- Knowledge Bank Section Ends -->

@endsection

@section('script')
    
@endsection