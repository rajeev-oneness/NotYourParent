@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Experts
@endsection

@section('content')

<section class="mentors_section" id="experts-tab">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase white">Choose the best Experts for you</h2>
            <p class="white proxima_light">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
        <div class="expart_search_wrap">
            <form action="{{route('front.experts')}}">
                <div class="expart_search_top">
                    <div class="expart_search_grid w-50">
                        <label>Available</label>
                        <select class="form-control" id="availability" name="availability">
                            <option value="" hidden>Select Availability</option>
                            @foreach($availabilities as $availability)
                            <option value="{{ $availability->id}}"  
                            @php
                                if (!empty($_GET['availability'])) {
                                    if ($_GET['availability'] == $availability->id) {
                                        echo 'selected';
                                    }
                                }
                            @endphp>{{ $availability->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="expart_search_grid w-50">
                        <label>Review Rating</label>
                        <select class="form-control" id="rating" name="rating" >
                            <option value="" >Select Rating</option>
                            <option value="1"
                            @php
                                if (!empty($_GET['rating'])) {
                                    if ($_GET['rating'] == 1) {
                                        echo 'selected';
                                    }
                                }
                            @endphp
                            >1</option>
                            <option value="2"
                            @php
                                if (!empty($_GET['rating'])) {
                                    if ($_GET['rating'] == 2) {
                                        echo 'selected';
                                    }
                                }
                            @endphp 
                            >2</option>
                            <option value="3" 
                            @php
                                if (!empty($_GET['rating'])) {
                                    if ($_GET['rating'] == 3) {
                                        echo 'selected';
                                    }
                                }
                            @endphp
                            >3</option>
                            <option value="4" 
                            @php
                                if (!empty($_GET['rating'])) {
                                    if ($_GET['rating'] == 4) {
                                        echo 'selected';
                                    }
                                }
                            @endphp
                            >4</option>
                            <option value="5" 
                            @php
                                if (!empty($_GET['rating'])) {
                                    if ($_GET['rating'] == 5) {
                                        echo 'selected';
                                    }
                                }
                            @endphp
                            >5</option>
                        </select>
                    </div>
                    <button class="search_icon_top" type="submit">
                        <img src="{{asset('front/images/search_icon.png')}}" alt="">
                    </button>
                </div>
            </form>
        </div>	
        <div class="mentor_tab_content_wrap">
            <div class="row">
            @forelse ($experts as $course)
            <div class="col-md-4 mb-3">
                <div class="mentor_course">
                    <div class="mentor_course_content">
                        <div class="mentor_course_review">
                            <div class="mentor_course_review_img">
                                <img src="{{asset($course->image)}}">
                            </div>
                            <div class="mentor_course_review_name">
                                <h5 class="mb-0">{{$course->name}}</h5>
                                <p class="mb-0">Expert in {{$course->user_primary_category ?$course->user_primary_category->name : "NA"}}</p>
                                
                            </div>
                        </div>
                        @if($course->bio)
                        <p class="small mt-3 mb-0" style="max-height: 60px;overflow: hidden">{{words($course->bio, 20)}}</p>
                        @else
                        <p class="small mt-3 mb-0" style="max-height: 60px;overflow: hidden">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro explicabo earum perspiciatis vitae eaque dolorum cupiditate dolores accusamus quidem....</p>
                        @endif

                        <div class="d-flex mb-2 mt-3">
                            <div class="availability_section">
                                <span class="badge badge-light badge-pill" title="Expert is {{ucwords($course->user_availability->name)}}"> <i class="fa fa-circle text-{{$course->user_availability->type}}"></i> {{ucwords($course->user_availability->name)}}</span>
                            </div>
                            <div class="rate_section">
                                @if (!empty($course->hourly_rate))
                                <span class="badge badge-light badge-pill" title="Hourly rate of Expert is ${{$course->hourly_rate}}">${{$course->hourly_rate}}/ hr</span>
                                @endif
                            </div>
                            <div class="rating_section">
                                @if (!empty($course->review))
                                <span class="badge badge-{{custom_review($course->review)}} badge-pill" title="K2 review is {{$course->review}}">{{$course->review}} <i class="fa fa-star"></i> </span>
                                @endif
                            </div>
                        </div>

                        <ul class="mt-4">
                            <li><a href="{{route('front.experts.single', ['expertId' => $course->id])}}">Visit Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
            </div>
        </div>
    </div>
    {{-- <div class="mentors_section_plane">
        <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
    </div> --}}
</section>

@endsection

@section('script')
    
@endsection