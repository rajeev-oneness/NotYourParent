@extends('front.layouts.master')

@section('head-script-style')
@endsection

@section('title')
    Home
@endsection

@section('content')
    <section class="banner_section" style="background-image: url({{ asset('front/images/banner.png') }});">
        <div class="container">
            <div class="banner_content" id="search-experts">
                <h3 class="text-uppercase black">Not Only <span class="proxima_black green">Your Parent</span></h3>
                <h1 class="text-uppercase proxima_bold">ALSO WE CAN <br><strong class="proxima_black">HELP
                        YOU<span>!</span></strong></h1>
                <p>Lorem ipsum dolor sit amet, <span>consectetur adipiscing</span> elit. Proin at risus. <span>Sed nec
                        congue</span> quam. Nulla sed tristique turpis. </p>
                <div class="banner_search_box">
                    <form action="{{ route('front.search.expert') }}" autocomplete="off">
                        {{-- <form action="{{route('front.directory')}}" autocomplete="off"> --}}
                        <input class="banner_search_field" placeholder="Search an Expert" type="text" name="search"
                            id="expert_input">
                        <a href="{{ route('front.experts') }}" class="banner_search_btn parimary_btn darkblue_btn">View all
                            Experts</a>
                    </form>
                    <div id="search_result" style="display: none;"></div>
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
                        <img src="{{ asset($how_it_works_main->image) }}">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="how_it_work_content">
                        <h2 class="proxima_black green"><strong
                                class="darkblue">{{ explodeCust($how_it_works_main->heading, 0) . ' ' . explodeCust($how_it_works_main->heading, 1) }}</strong><br>{{ explodeCust($how_it_works_main->heading, 2) }}
                            <sub class="darkblue">{{ explodeCust($how_it_works_main->heading, 3) }}</sub><br><span
                                class="black"><b
                                    class="golden">{{ explodeCust($how_it_works_main->heading, 4) }}</b>
                                {{ explodeCust($how_it_works_main->heading, 5) }}</span></h2>
                        {{-- <h2 class="proxima_black green"><strong class="darkblue">{{$how_it_works_main->heading}}</strong></h2> --}}
                        <p>{{ $how_it_works_main->description }}</p>
                        <div class="our_process_wrap">
                            <div class="row">
                                @foreach ($how_it_works_child as $item)
                                    <div class="col-3">
                                        <a href="{{ $item->link }}" class="d-block">
                                            <div class="our_process_item">
                                                <div class="our_process_img">
                                                    <img src="{{ asset($item->image) }}">
                                                </div>
                                                <h4 class="text-uppercase proxima_exbold black">{{ $item->heading }}</h4>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <a href="{{ route('front.about-us') }}" class="parimary_btn darkblue_btn">Know More</a>
                    </div>
                </div>
            </div>

            <div class="how_ite_works_plane">
                <img class="img-fluid" src="{{ asset('front/images/how_it_work_plane.png') }}">
            </div>
        </div>
    </section>
    <!-- how_it_work_section -->

    <section class="mentors_section">
        <div class="container">
            <div class="section_heading how_it_wrok_heading text-center">
                <h2 class="proxima_black text-uppercase white">Choose the best Experts for you</h2>
                <p class="white proxima_light">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
            </div>

            <ul class="nav nav-pills mb-3 mentor_tab_menu" id="pills-tab" role="tablist">
                @foreach ($data->categories as $categoryKey => $categoryValue)
                    <li class="nav-item">
                        <a class="nav-link {{ $categoryKey == 0 ? 'active' : '' }}"
                            id="pills-{{ $categoryValue->id }}-tab" data-toggle="pill"
                            href="#pills-{{ $categoryValue->id }}" role="tab"
                            aria-controls="pills-{{ $categoryValue->id }}"
                            aria-selected="true">{{ $categoryValue->name }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="pills-tabContent">
                @foreach ($data->categories as $categoryKey => $categoryValue)
                    <div class="tab-pane fade {{ $categoryKey == 0 ? 'show active' : '' }}"
                        id="pills-{{ $categoryValue->id }}" role="tabpanel"
                        aria-labelledby="pills-{{ $categoryValue->id }}-tab">
                        <div class="row">
                            @forelse ($categoryValue->expertLists as $item)
                                <div class="col-md-4 mb-3">
                                    <div class="mentor_course">
                                        <div class="mentor_course_content">
                                            <div class="mentor_course_review">
                                                <div class="mentor_course_review_img">
                                                    <img src="{{ asset($item->image) }}">
                                                </div>
                                                <div class="mentor_course_review_name">
                                                    <h5 class="mb-0">{{ $item->name }}</h5>
                                                    <p class="mb-0">Expert in {{ $item->user_primary_category->name }}</p>
                                                </div>
                                            </div>
                                            <p class="small mt-3 mb-0" style="max-height: 60px;overflow: hidden">
                                                {{ words($item->bio, 20) }}</p>

                                            <div class="d-flex mb-2 mt-3">
                                                <div class="availability_section">
                                                    <span class="badge badge-light badge-pill"
                                                        title="Expet is {{ ucwords($item->user_availability->name) }}"> <i class="fa fa-circle text-{{ $item->user_availability->type }}"></i> {{ ucwords($item->user_availability->name) }}</span>
                                                </div>
                                                <div class="rate_section">
                                                    @if (!empty($item->hourly_rate))
                                                        <span class="badge badge-light badge-pill"
                                                            title="Hourly rate of Expert is ${{ $item->hourly_rate }}">${{ $item->hourly_rate }}/
                                                            hr</span>
                                                    @endif
                                                </div>
                                                <div class="rating_section">
                                                    @if (!empty($item->review))
                                                        <span
                                                            class="badge badge-{{ custom_review($item->review) }} badge-pill"
                                                            title="K2 review is {{ $item->review }}">{{ $item->review }}
                                                            <i class="fa fa-star"></i> </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <ul class="mt-4">
                                                <li><a href="{{ route('front.experts.single', ['expertId' => $item->id]) }}">Visit Profile</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center mb-3">
                                    <div class="card no-product">
                                        <div class="card-body">
                                            <h5 class="mb-0">No Experts available for {{ $categoryValue->name }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="text-center view_all_mentor">
                <a href="{{ route('front.experts') }}" class="green_btn parimary_btn">View Available Experts</a>
            </div>
        </div>
        <div class="mentors_section_plane">
            <img class="img-fluid" src="{{ asset('front/images/how_it_work_plane.png') }}">
        </div>
    </section>

    <!-- Calendar Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose Slot</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('front.calendar')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Book Slot</button>
                </div>
            </div>
        </div>
    </div>
    <!-- mentors_section -->

    <section class="review_section">
        <div class="container">
            <div class="section_heading how_it_wrok_heading text-center">
                <h2 class="proxima_black text-uppercase darkblue">Reviews & Feedbacks</h2>
                <p class="darkgray proxima_light">Greater Pittsburgh's Expert Basement Waterproofing & Foundation Repair
                    Contractor</p>
            </div>

            <div class="review_slider_wrap position-relative">
                <div class="review_slider owl-carousel owl-theme">
                    @foreach ($data->testimonials as $testimonial)
                        <div class="review_slider_item">
                            <div class="review_slider_item_left">
                                <p>{!! $testimonial->quote !!}</p>

                                <div class="review_person">
                                    <div class="review_person_img align-self-center">
                                        <img src="{{ asset($testimonial->image) }}">
                                    </div>
                                    <div class="review_person_details align-self-center">
                                        <h4 class="text-uppercase darkblue proxima_exbold">{{ $testimonial->name }}</h4>
                                        <h5 class="text-uppercase darkgray">{{ $testimonial->designation }}</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="review_slider_item_right">
                                <div class="class_teacher_description align-self-center">
                                    <h3 class="text-uppercase white">Total <span class="golden">120+</span>
                                        <br><b>Classes</b></h3>
                                    <div class="class_teacher_name">
                                        <h4 class="white proxima_exbold">{{ $testimonial->teacherDetails->name }}</h4>
                                        <h5 class="text-uppercase white proxima_exbold">MUSIC TRICKS</h5>
                                        <img src="{{ asset('front/images/reviews_star.png') }}">
                                        <a class="secondary_btn green_btn"
                                            href="{{ route('front.experts.single', ['expertId' => $testimonial->teacherDetails->id]) }}">More
                                            Classes</a>
                                    </div>
                                </div>
                                <div class="class_teacher_img_wrap position-relative align-self-center">
                                    <div class="class_teacher_img">
                                        <img src="{{ asset($testimonial->teacherDetails->image) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="review_slider_plane">
                    <img class="img-fluid" src="{{ asset('front/images/how_it_work_plane.png') }}">
                </div>
            </div>

            <div class="text-center">
                <a href="javascript:void(0);" class="parimary_btn darkblue_btn">READ ALL REVIEWS</a>
            </div>
        </div>
        <span class="review_yellow_plane"><img class="img-fluid"
                src="{{ asset('front/images/yellow-plane.png') }}"></span>
    </section>
    <!-- review_section -->

    <section class="become_member_section position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 align-self-center">
                    <div class="become_member_device">
                        <img class="img-fluid" src="{{ asset('front/images/member-device.png') }}">
                    </div>
                </div>
                <div class="col-lg-4 align-self-center">
                    <div class="become_member_content">
                        <h2 class="darkblue text-uppercase">Let’s <b class="proxima_exbold">Become a</b> <span
                                class="green proxima_exbold">EXPERT</span></h2>
                        <p class="darkgray proxima_light">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        <a href="{{ route('front.sign-up', ['userType' => 2]) }}" class="parimary_btn darkblue_btn">Start
                            Today</a>
                    </div>
                </div>
            </div>
        </div>
        <span class="member_yellow_plane"><img class="img-fluid"
                src="{{ asset('front/images/member-plane.png') }}"></span>
    </section>
    <!-- become_member_section -->

    <section class="recent_article_section">
        <div class="container">
            <div class="section_heading how_it_wrok_heading text-center">
                <h2 class="proxima_black text-uppercase white">Recent Articles</h2>
                <p class="white proxima_light">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
            </div>

            <div class="row justify-content-center">
                @foreach ($data->articles as $article)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="recent_article_item">
                            <div class="recent_article_img">
                                <a class="d-block"
                                    href="{{ route('front.articles.single', ['articleId' => $article->id]) }}">
                                    <img src="{{ asset($article->image) }}">
                                </a>
                            </div>
                            <div class="recent_article_des">
                                <span
                                    class="article_date proxima_bold">{{ date('d M,Y', strtotime($article->created_at)) }}</span>
                                <h3 class="proxima_exbold"><a class="d-block"
                                        href="{{ route('front.articles.single', ['articleId' => $article->id]) }}">{{ $article->title }}</a>
                                </h3>
                                <p class="darkgray">{{ $article->description }}</p>
                                <a href="{{ route('front.articles.single', ['articleId' => $article->id]) }}"
                                    class="secondary_btn darkblue_btn">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center view_all_mentor explore_all_article">
                <a href="{{ route('front.articles') }}" class="green_btn parimary_btn">Explore All</a>
            </div>
        </div>
    </section>
    <!-- recent_article_section -->
@endsection

@section('script')
    <script>
        $(document).mouseup(function(e) {
            var searchHolder = $("#search_result");
            if (!searchHolder.is(e.target) && searchHolder.has(e.target).length === 0) {
                searchHolder.hide();
            }
        });
    </script>

    {{-- <script>
    let d = new Date();
    month = ['Jan','Feb','March','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    week = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    thisWeek = d.getDay();
    thisMonth = d.getMonth();
    thisYear = d.getFullYear();
    function daysInMonth (month, year) {
        return new Date(year, month, 0).getDate();
    }
    days = daysInMonth(thisMonth, thisYear);
    $('.weeks').empty();
    $('.dates').empty();
    totalWeek = thisWeek+6;
    for (let index = thisWeek; index <= totalWeek; index++) {
        weekDay = '<div class="days">'+week[index]+'</div>';
        if(totalWeek > 6) {
            // weekDay = '<div class="days">'+week[totalWeek-index]+'</div>';
        }
        $('.weeks').append(weekDay);
    }
    for (let index = 0; index < 35; index++) {
        dates = '<div class="date-boxes">'+(index+1)+'</div>';
        if(index >= days) {
            dates = '<div class="date-boxes inactive">'+((index-days)+1)+'</div>';
        }
        $('.dates').append(dates);
    }

    console.log(month[thisMonth-1]);
    console.log(days);
</script> --}}
    <script>
        let d = new Date();
        thisWeek = d.getDay();
        thisMonth = d.getMonth();
        thisYear = d.getFullYear();
        $("#slot_modal").click(function() {
            mentorId = $(this).data('mentor');
            courseId = $(this).data('course');
        })
    </script>
@endsection
