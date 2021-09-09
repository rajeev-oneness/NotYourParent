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
                                <h5>{{$course->name}}</h5>
                                <p class="mb-0">{{$course->short_description}}</p>
                            </div>
                        </div>
                        <p class="small mb-0" style="max-height: 60px;overflow: hidden">{{words($course->bio, 20)}}</p>

                        <div class="d-flex mb-2">
                            <div class="availability_section">
                                <span class="badge badge-light badge-pill" title="Expet is {{ucwords($course->user_availability->name)}}"> <i class="fa fa-circle text-{{$course->user_availability->type}}"></i> {{ucwords($course->user_availability->name)}}</span>
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

                        <ul>
                            <li><a href="javascript:void(0);">Consult Now</a></li>
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