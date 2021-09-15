@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Category single
@endsection

<style>
    /* .pagination {
        justify-content: flex-end;
    } */
</style>

@section('content')

<section class="mentors_section directory_mentors_section" style="margin-top: 280px;">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">
                <img src="{{asset($categoryName->image)}}" alt="category-image" style="height: 100px;">
                {{$categoryName->name}}
            </h2>
            <p class="darkgray proxima_light">Experts & Case studies related to {{$categoryName->name}}</p>
        </div>

        <div class="row" id="expert_list">
            <div class="col-md-12">
                <div class="available_sessions">
                    <h3 class="proxima_normal darkblue" id="count_section">Experts' lists</h3>
                </div>
            </div>
            @forelse ($experts_data as $course)
            <div class="col-md-4 mb-3">
                <div class="mentor_course">
                    <div class="mentor_course_content">
                        <div class="mentor_course_review">
                            <div class="mentor_course_review_img">
                                <img src="{{asset($course->image)}}">
                            </div>
                            <div class="mentor_course_review_name">
                                <h5 class="mb-0">{{$course->name}}</h5>
                                <p class="mb-0">Expert in {{$course->user_primary_category->name}}</p>
                            </div>
                        </div>
                        <p class="small mt-3 mb-0" style="max-height: 60px;overflow: hidden">{{words($course->bio, 20)}}</p>

                        <div class="d-flex mb-2 mt-3">
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

                        <ul class="mt-4">
                            {{-- <li><a href="javascript:void(0);">Consult Now</a></li> --}}
                            <li><a href="{{route('front.experts.single', ['expertId' => $course->id])}}">Visit Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <h4 class="mb-5 text-muted">No experts found for this category</h4>
            </div>
            @endforelse
        </div>

        {{-- <div class="available_sessions">
            <h3 class="proxima_normal darkblue" id="count_section"></h3>
        </div> --}}
        <div class="row" id="course_list">
            <div class="col-md-12">
                <div class="available_sessions">
                    <h3 class="proxima_normal darkblue" id="count_section">Case studies</h3>
                </div>
            </div>
            @forelse ($data as $item)
            <div class="col-lg-4">
                <div class="mentor_course">
                    <div class="mentor_course_img">
                        <img src="{{asset($item->image)}}">
                        <div class="mentor_course_overlay">
                            <h4 class="white proxima_exbold text-uppercase mb-5"><sub class="proxima_normal">{{substr($item->name, 0, 80)}}</sub></h4>
                                {{-- <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">{{substr($course->name, 0, 7)}}</sub>{{substr($course->name, 7,11)}} </h4> --}}
                                {{-- <h3 class="green proxima_exbold text-uppercase">{{substr($course->name, 18,14)}}</h3> --}}
                            <ul>
                                <li class="mentor_time"><img src="{{asset('front/images/time_icon.png')}}"> {{$item->duration}} minutes</li>
                                <li class="mentor_price">{{$item->price}}$ <span>Only</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mentor_course_content">
                        <div class="mentor_course_review">
                            <div class="mentor_course_review_img">
                                <img src="{{asset($item->expert_image)}}">
                            </div>
                            <div class="mentor_course_review_name">
                                <h5>{{$item->expert_name}}</h5>
                                {{-- <h6>{{$item->expert_short_desc}}</h6> --}}
                            </div>
                        </div>
                        <p class="mt-2">{{words($item->description, 20)}}</p>
                        <ul>
                            <li><a href="{{route('front.courses.single', ['courseId' => $item->id])}}">View More</a></li>
                            {{-- <li><a href="{{route('front.experts.single', ['expertId' => $item->expert_id])}}">Visit Profile</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <h4 class="mb-5 text-muted">No case study found for this category</h4>
            </div>
            @endforelse

            <div class="col-md-12">
                {{$data->links()}}
            </div>
        </div>
    </div>
    <div class="mentors_section_plane">
        <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
    </div>
</section>

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
                    <h2 class="darkblue text-uppercase">Let’s <b class="proxima_exbold">Become a</b> <span class="green proxima_exbold">STUDENT</span></h2>
                    <p class="darkgray proxima_light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    <a href="{{route('front.sign-up',['userType' => 3])}}" class="parimary_btn darkblue_btn">Sign up for advice</a>
                </div>
            </div>
        </div>
    </div>
    <span class="member_yellow_plane"><img class="img-fluid" src="{{asset('front/images/member-plane.png')}}"></span>
</section>

@endsection

@section('script')
<script>
    // let d = new Date();
    // thisWeek = d.getDay();
    // thisMonth = d.getMonth();
    // thisYear = d.getFullYear();
    // $("#slot_modal").click(function() {
    //     mentorId = $(this).data('mentor');
    //     courseId = $(this).data('course');
    // })
</script>
@endsection