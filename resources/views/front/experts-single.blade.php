@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Experts single
@endsection

@section('content')
<!-- featured expert starts -->
<section class="featured_experts">
    <div class="container">
        <div class="featured_experts_left">
            <div class="jenny_status">
                <div class="online"><span class="active bg-{{$teacher->user_availability->type}}"></span> <a class="text-uppercase darkblue" href="javascript:void(0);">{{$teacher->user_availability->name}}</a> </div>

                @if ($teacher->is_verified == 1)
                <a class="darkblue proxima_exbold verified" href="javascript:void(0);"> <i class="fa fa-check text-success"></i> Verified </a>
                @else
                <a class="darkblue proxima_exbold verified" href="javascript:void(0);"> <i class="fa fa-ban text-danger"></i> Not Verified </a>
                @endif
            </div>
            <h1 class="proxima_exbold darkblue text-uppercase">{{$teacher->name}}</h1>
            @foreach ($topics as $topic)
                <h3 class="golden designation">{{$topic->topicDetail->name}}</h3>
            @endforeach
            <h3 class="proxima_exbold black">TOTAL <span class="golden">120+</span> CLASSES <span style="color: #e76f37;">4.5</span> <span class="proxima_normal" style="color: #003456;">Ratings</span></h3>
            <h3 style="color: #003456;"><span class="darkblue proxima_exbold">34,598</span> Students</h3>
            <h6 class="darkblue text-uppercase proxima_bold">Regular sessions</h6>

            <div class="calender">
                <input type="hidden" id="expId" value="{{ $expId }}">
                <div class="calender_left"  id="calender">
                    <div class="calender_heading">
                        <h4 class="proxima_exbold black">{{ date('M',strtotime($currentDate)) }} <span class="green">{{ date('Y',strtotime($currentDate)) }}</span></h4>
                        <ul>
                            <li><a href="{{route('front.experts.dates', ['expertId' => $teacher,'currentDate' => date('Y-m-d', strtotime('-1 month', strtotime($currentDate)))])}}"><img src="{{asset('front/images/blue-arrow-left.png')}}" alt=""></a></li>
                            <li><a href="{{route('front.experts.dates', ['expertId' => $teacher,'currentDate' => date('Y-m-d', strtotime('+1 month', strtotime($currentDate)))])}}"><img src="{{asset('front/images/blue-arrow-right.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="calendar-table">
                        <div class="weeks">
                            @for($days = 0; $days < 7; $days++)
                                <div class="days">{{date('D',strtotime($currentDate.'+'.$days.' day'))}}</div>
                            @endfor 
                        </div>
                        <div class="dates">
                            @for($days=1;$days <= getDays(date('m',strtotime($currentDate)),date('Y',strtotime($currentDate))); $days++ )
                                <div class="date-boxes @if(date('Y-m-d',strtotime(date('Y',strtotime($currentDate)).'-'.date('m',strtotime($currentDate)).'-'.$days)) < date('Y-m-d')){{('inactive')}}@endif" id="{{ date('Y-m',strtotime($currentDate)).'-'.$days }}" onclick="dayClick(this.id)">{{ $days }}</div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="calender_right" id="calender_right" >
                    <h5 class="white">SLOT</h5>
                    <p class="small text-center">Select date to find slot</p>
                    {{-- <ul class="times">
                        <li>7:00am - 7:15am</li>
                        <li>7:30am - 7:45am</li>
                        <li>8:15am - 8:30am</li>
                        <li>9:00am - 9:15am</li>
                        <li>9:45am - 10:00am</li>
                        <li>4:00pm - 4:15pm</li>
                        <li>4:45pm - 5:00pm</li>
                    </ul> --}}
                </div>
            </div>
        </div>
        <div class="featured_experts_right">
            <div class="img-container">
                <img src="{{asset($teacher->image)}}" alt="">
                {{-- <img src="{{asset('front/images/testimonial-image-female.jpg')}}" alt=""> --}}
            </div>
            <div class="footer_social">
                <ul>
                    <li><a href="{{($teacher->linkedin_url != '')?$teacher->linkedin_url:'javascript:void(0);'}}"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="{{($teacher->fb_url != '')?$teacher->fb_url:'javascript:void(0);'}}"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="{{($teacher->twitter_url != '')?$teacher->twitter_url:'javascript:void(0);'}}"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{{($teacher->instagram_url != '')?$teacher->instagram_url:'javascript:void(0);'}}"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>

            @if (!empty($teacher->hourly_rate))
                <h6 class="darkblue text_uupercase proxima_exbold">Rate</h6>
                <p>${{$teacher->hourly_rate}}/ hour</p>
            @endif

            <h6 class="darkblue text_uupercase proxima_exbold">Languages</h6>
            @foreach ($userLanguagesKnown as $item)
                <button type="button" class="btn btn-sm btn-secondary">{{ucwords($item->name)}}</button>
            @endforeach

            @if (!empty($teacher->short_description))
                <h6 class="darkblue text_uupercase proxima_exbold mt-3">Short description</h6>
                <p>{{$teacher->short_description}}</p>
            @endif

            @if (!empty($teacher->bio))
                <h6 class="darkblue text_uupercase proxima_exbold mt-3">QUOTE</h6>
                <p>{!!$teacher->bio!!}</p>
            @endif
        </div>
    </div>
</section>
<!-- featured experts ends  -->



<!-- my sessions starts  -->
<section id="my_sessions">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">Case studies (<span class="golden">{{$coursesCount}}</span>)</h2>
            <p class="darkgray proxima_light">Greater Pittsburgh's Expert Basement Waterproofing & Foundation Repair
                Contractor</p>
        </div>
        {{--  --}}
        <div class="row">
            @forelse ($courses as $course)
            {{-- foreach ($reviews as $review) --}}
            <div class="col-lg-4 col-md-6">
                <div class="mentor_course">
                    <div class="mentor_course_img">
                        <img src="{{asset($course->image)}}">
                        <div class="mentor_course_overlay">
                            <h4 class="white proxima_exbold text-uppercase mb-5"><sub class="proxima_normal">{{substr($course->name, 0, 80)}}</sub></h4>
                                {{-- <h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">{{substr($course->name, 0, 7)}}</sub>{{substr($course->name, 7,11)}} </h4> --}}
                                {{-- <h3 class="green proxima_exbold text-uppercase">{{substr($course->name, 18,14)}}</h3> --}}
                            <ul>
                                <li class="mentor_time"><img src="{{asset('front/images/time_icon.png')}}"> {{$course->duration}} minutes</li>
                                <li class="mentor_price">{{ $course->price }}$ <span>Only</span></li>
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
                        <p></p>
                        <ul>
                            {{-- <li><a href="{{url()->current()}}">Consult Now</a></li> --}}
                            <li><a href="{{route('front.courses.single', ['courseId' => $course->id])}}">View Now</a></li>
                            <li><a href="{{route('front.experts.single', ['expertId' => $course->teacherDetail->id])}}">Visit Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <h5 class="">No sessions found for this tutor !</h5>
            </div>
            @endforelse
        </div>
        {{-- --}}
        
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
<script>
    function dayClick(selectedDate) {
        const expId = $("#expId").val();
        $.ajax({
            url: "{{ route('get.slot.by.date') }}",
            type: "POST",
            data: { _token: "{{ csrf_token() }}", date: selectedDate, expertId: expId },
            success:function(data) {
                $("#calender_right").empty();
                console.log(data.data);
                let calendarRight = '';
                calendarRight += '<h5 class="white">'+data.date+'</sup></h5><ul class="times">';
                if(data.data.length > 0) {
                    $.each(data.data, function(i, val) {
                        calendarRight += '<li>'+val.time+'</li>';
                        calendarRight += '<li>'+val.note+'</li>';
                        calendarRight += '<li><a href="#" class="btn btn-sm btn-danger">Book now</a></li>';
                        // $('#calender_right').show();
                    })
                } else {
                    calendarRight += '<li>No Slots!</li>';
                    $('#calender_right').show();
                }
                calendarRight += '</ul>';
                $("#calender_right").append(calendarRight);
            }
        })
    }
</script>
@endsection