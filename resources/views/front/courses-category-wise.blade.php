@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Home
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
            <h2 class="proxima_black text-uppercase darkblue">{{$categoryName->name}}</h2>
            <p class="darkgray proxima_light">Courses related to {{$categoryName->name}} category</p>
        </div>

        <div class="available_sessions">
            <h3 class="proxima_normal darkblue" id="count_section"></h3>
        </div>
        <div class="row" id="course_list">
            @foreach ($data as $item)
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
                                <h6>{{$item->expert_short_desc}}</h6>
                            </div>
                        </div>
                        <p>{{words($item->description, 20)}}</p>
                        <ul>
                            <li><a href="{{route('front.courses.single', ['courseId' => $item->id])}}">Consult Now</a></li>
                            <li><a href="{{route('front.experts.single', ['expertId' => $item->expert_id])}}">Visit Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach

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