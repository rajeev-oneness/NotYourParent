@extends('front.layouts.master')

@section('head-script-style')
@endsection

@section('title')
    My Jobs
@endsection

@section('content')

<section class="job_listing header_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10 col-md-12">
                <h3 class="searchHeading">Search</h3>
                <div class="searchBox">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <h5>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-rss"><path d="M4 11a9 9 0 0 1 9 9"></path><path d="M4 4a16 16 0 0 1 16 16"></path><circle cx="5" cy="19" r="1"></circle></svg>
                        <span>{{ $job->count() }}</span> &nbsp;jobs found
                    </h5>
                </div>
                <div class="col">
                    <form action="{{ route('front.my.jobs') }}">
                        <div class="joblist_search">
                            <input type="text" name="term" id="term" class="form-control" placeholder="Search here.." value="{{app('request')->input('term')}}" autocomplete="off">
                            <button class="jobsearch_btn" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="job_list_wrap">
            @foreach ( $job as $key=> $item )
            <div class="job_list jobDetailsmodal" data-popup="jobDetailsModal{{ $item->id }}">
                <div class="job_list_top">
                    <div class="row">
                        <div class="col">
                            <h4 class="job_list_title">
                               {{ $item->title }}
                            </h4>
                        </div>
                        <div class="col-auto">
                            <ul class="m-0 p-0">
                                {{-- <li>
                                    <button class="feedJob_btn">
                                        <i class="far fa-thumbs-down"></i>
                                    </button>
                                </li> --}}
                                <!-- <li>

                                    <a href="{{ route('front.user.save.jobs','$item->id') }}}" class="btn btn-blue wishlist text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                        </svg>
                                    </a>

                                    <a href="{!! URL::to('save-user-job/'.$item->id) !!}" class="btn btn-light text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                        </svg>
                                    </a>

                                    {{-- <button id="saveBtn" class="saveJob_btn save_unsave">
                                        <i class="far fa-heart not_save"></i>
                                        <i class="fas fa-heart is_save"></i>
                                    </button> --}}
                                    </a>
                                </li> -->
                                <li>
                                        <button class="share_button dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#898989" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <div class="w-100 pl-2">
                                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                                    <a class="a2a_button_facebook"></a>
                                                    <a class="a2a_button_twitter"></a>
                                                    <a class="a2a_button_email"></a>
                                                    <a class="a2a_button_whatsapp"></a>
                                                    <a class="a2a_button_pinterest"></a>
                                                    <a class="a2a_button_linkedin"></a>
                                                    <a class="a2a_button_telegram"></a>
                                                    <a class="a2a_button_facebook_messenger"></a>
                                                    <a class="a2a_button_google_gmail"></a>
                                                    <a class="a2a_button_reddit"></a>
                                                </div>
                                            </div>
                                        </div>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="job_time_est">
                    <small class="text-muted">
                        <strong>Hourly - </strong>
                        <span>{{ $item->time }}</span>
                        <span> - Est. Time: </span>
                        <span> - {{ $item->duration }}</span>
                        <span> - Posted<span> &nbsp;{{ $item->created_at }} </span></span>
                    </small>
                </div>
                <div class="job_description_text">
                    <p>
                        {{ $item->description }}.
                    </p>
                </div>
                <div class="job_skill_slider swiper">
                    <div class="swiper-button-prev">
                    </div>
                    <div class="swiper-wrapper">
                        <div class="job_skill swiper-slide"><a href="#">{{ $item->skill }}</a></div>
                        {{-- <div class="job_skill swiper-slide"><a href="#">Adobe Illustrator</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Facebook</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Logo Design</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Social Media Imagery</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Instagram</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Brand Identity & Guidelines</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Photo Editing</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Web Design</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Adobe Photoshop</a></div> --}}
                    </div>
                    <div class="swiper-button-next">
                    </div>
                </div>

                <div class="proposals_text">
                    <small class="d-inline-block mr-10">
                        <span class="text-muted">Proposals: </span>
                        <strong data-test="proposals">Less than 5</strong>
                    </small>
                </div>

                <div class="badge-line">
                   <!--  <small class="payment_verification_status unverified_status" class="d-inline-flex">
                        <strong class="text-muted"><i class="fas fa-times-circle"></i> Payment unverified</strong>
                    </small> -->
                    <!-- <small class="job_star_rating unverified_rating">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                    </small>
 -->
                    <small class="job_location">
                        <span><i class="fas fa-map-marker-alt"></i>
                            {{ $item->location }}
                        </span>
                    </small>
                    <small class="client-spendings" class="d-inline-block"><strong>${{ $item->budget }}</strong> &nbsp;<span class="text-muted">spent</span></small>
                    <small class="connects-to-apply" class="d-none d-lg-inline-flex d-md-inline-flex text-muted">
                    Connects to apply:&nbsp;
                    <a href="{{route('front.jobs.proposals',['id' => $item->id])}}"><strong class="connect-price">{{$item->job->count()}} Connects</strong></small></a>
                </div>
            </div>
            <div class="job_modal" id="jobDetailsModal{{ $item->id }}">
                <div class="job_modal-content">
                    <div class="job_modal_header">
                        <button type="button" class="modalClose"><i class="far fa-angle-left"></i></button>
                    </div>
                    <div class="job_modal_body">
                        <div class="job_modal_body_inner">
                            <div class="row ml-0 mr-0">
                                <div class="col job_modal_body_left">
                                    <h3>{{ $item->title }}</h3>
                                    <div class="job_cat">
                                        <h6>{{ $item->cat ? $item->cat->title : '' }}</h6>
                                        <span>{{ $item->created_at }}</span>
                                        <div class="job_location">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>{{ $item->location }}</span>
                                        </div>
                                    </div>
                                    <div class="job-description job_left_spacing">
                                        <p>
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                    <div class="project_brief job_left_spacing">
                                        <ul class="d-flex justify-content-between">
                                            <li>
                                                <i class="far fa-clock"></i>
                                                <div class="content">
                                                    <strong>{{ $item->time }}</strong>
                                                    <small>Hourly</small>
                                                </div>
                                            </li>
                                            <li>
                                                <i class="far fa-calendar-alt"></i>
                                                <div class="content">
                                                    <strong>{{ $item->duration }}</strong>
                                                    <small>Project Length</small>
                                                </div>
                                            </li>
                                            <li>
                                                <i class="fas fa-head-side-brain"></i>
                                                <div class="content">
                                                    <strong>Expert</strong>
                                                    <small>
                                                        {{ $item->experience }}.
                                                    </small>
                                                </div>
                                            </li>
                                            <li>
                                                <i class="fas fa-stopwatch"></i>
                                                <div class="content">
                                                    <strong>{{ $item->budget }}</strong>
                                                    <small>Hourly</small>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project_type job_left_spacing">
                                        <p>Project type: <span>{{ $item->type }} project</span></p>
                                    </div>
                                    <div class="job_skill job_left_spacing">
                                        <h4>Skills and Expertise</h4>
                                        <div class="row">
                                            <div class="col">
                                                <h5>Must have</h5>
                                                <a href="#">{{ $item->skill }}</a>
                                               <!--  <a href="#">CSS</a>
                                                <a href="#">Bootstrap</a>
                                                <a href="#">Javascript</a>
                                                <a href="#">jQuery</a> -->
                                            </div>
                                            <div class="col">
                                                <h5>Good to have</h5>
                                                <a href="#">SASS</a>
                                                <a href="#">Github</a>
                                                <a href="#">React/Angular</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(!Auth::user())
                                <div class="job_modal_body_right">
                                    <div class="btn_group">
                                        <button type="" class="btn submit_proposal">Submit a Proposal</button>
                                        <button class="btn save_job"><i class="far fa-heart"></i> Save Job </button>
                                    </div>
                                    @endif
                                    <div class="aboutClient">
                                        <h4>About the client</h4>
                                        <small class="payment_verification_status verified_status badge-line">
                                            <strong class="text-muted">
                                                <i class="fas fa-badge-check"></i>
                                                {{Auth::user()->name}}
                                            </strong>
                                        </small>
                                        <!-- <div class="clientsRating">
                                            <small class="job_star_rating verified_rating">
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                            </small>
                                            <span>5.00 of 2 reviews</span>
                                        </div> -->
                                        <ul class="client_brief">
                                            <li>
                                                <strong>{{Auth::user()->address}}</strong>
                                               <!--  <p>
                                                    Davie <span>1:47 pm </span>
                                                </p> -->
                                            </li>
                                           <!--  <li>
                                                <strong> jobs posted</strong>
                                                <p>
                                                    50% hire rate, 1 open job
                                                </p>
                                            </li> -->
                                            <!-- <li>
                                                <strong>$100k+ total spent</strong>
                                                <p>
                                                    53 hires, 4 active
                                                </p>
                                            </li>
                                            <li>
                                                <strong>
                                                    20.06 /hr avg hourly rate paid
                                                </strong>
                                                <p>
                                                    4,714 hours
                                                </p>
                                            </li> -->
                                            <li>
                                                <small>Member since {{ Auth::user()->created_at }}</small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
</section>





@endsection

@section('script')
<script async src="https://static.addtoany.com/menu/page.js"></script>
<script
        src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.14/moment-timezone-with-data-2012-2022.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".job_skill_slider", {
      slidesPerView: "auto",
      centeredSlides: false,
      dots:false,
      spaceBetween: 10,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
<script>
        var swiper = new Swiper(".job_skill_slider", {
            slidesPerView: "auto",
            centeredSlides: false,
            dots: false,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        $(".save_unsave").click(function () {
            $(this).children(".not_save").toggle();
            $(this).children(".is_save").toggle();
        });

        $(".jobDetailsmodal").click(function () {
            var jobModal = $(this).attr("data-popup");
            $(".job_modal").not(jobModal).removeClass("show");
            $("#" + jobModal).addClass("show");
            $(".job_modal_overlay").addClass("showoverlay");
        });
        $(".jobDetailsmodal a, .save_unsave, .feedJob_btn, .swiper-button-next, .swiper-button-prev").click(function (e) {
            e.stopPropagation();
        });

        $(".modalClose, .job_modal_overlay").click(function () {
            $(".job_modal").removeClass("show");
            $(".job_modal_overlay").removeClass("showoverlay");
        });
    </script>
@endsection
