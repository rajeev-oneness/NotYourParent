@extends('front.layouts.master')

@section('head-script-style')
@endsection

@section('title')
    Job Listing
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
                    <form action="{{ route('front.jobs.index') }}">
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
            <div class="job_list">
                <div class="job_list_top">
                    <div class="row">
                        <div class="col">
                            <h4 class="job_list_title">
                                <a href="#">{{ $item->title }}</a>
                            </h4>
                        </div>
                        <div class="col-auto">
                            <ul class="m-0 p-0">
                                {{-- <li>
                                    <button class="feedJob_btn">
                                        <i class="far fa-thumbs-down"></i>
                                    </button>
                                </li> --}}
                                <li>
                                    @if ($businessSaved == 1)
                                    <a href="{{ route('front.user.save.jobs','$item->id') }}}" class="btn btn-blue wishlist text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                        </svg>
                                    </a>
                                    @else
                                    <a href="{!! URL::to('save-user-job/'.$item->id) !!}" class="btn btn-light text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                        </svg>
                                    </a>
                                    @endif
                                    {{-- <button id="saveBtn" class="saveJob_btn save_unsave">
                                        <i class="far fa-heart not_save"></i>
                                        <i class="fas fa-heart is_save"></i>
                                    </button> --}}
                                    </a>
                                </li>
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
                    <small class="payment_verification_status unverified_status" class="d-inline-flex">
                        <strong class="text-muted"><i class="fas fa-times-circle"></i> Payment unverified</strong>
                    </small>
                    <small class="job_star_rating unverified_rating">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                    </small>

                    <small class="job_location">
                        <span><i class="fas fa-map-marker-alt"></i>
                            {{ $item->location }}
                        </span>
                    </small>
                    <small class="client-spendings" class="d-inline-block"><strong>${{ $item->budget }}</strong> &nbsp;<span class="text-muted">spent</span></small>
                    <!-- <small class="connects-to-apply" class="d-none d-lg-inline-flex d-md-inline-flex text-muted">
                    Connects to apply:&nbsp;
                    <strong class="connect-price">1 Connects</strong></small> -->
                </div>
            </div>
            @endforeach

            {{-- <div class="job_list">
                <div class="job_list_top">
                    <div class="row">
                        <div class="col">
                            <h4 class="job_list_title">
                                <a href="#">Graphic Designer cum Digital Marketing Head</a>
                            </h4>
                        </div>
                        <div class="col-auto">
                            <ul class="m-0 p-0">
                                <li>
                                    <button class="feedJob_btn">
                                        <i class="far fa-thumbs-down"></i>
                                    </button>
                                </li>
                                <li>
                                    <button class="saveJob_btn save_unsave">
                                        <i class="far fa-heart not_save"></i>
                                        <i class="fas fa-heart is_save"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="job_time_est">
                    <small class="text-muted">
                        <strong>Hourly - </strong>
                        <span>Intermediate</span>
                        <span> - Est. Time: </span>
                        <span> - More than 6 months, 30+ hrs/week</span>
                        <span> - Posted<span> &nbsp;1 hour ago</span></span>
                    </small>
                </div>
                <div class="job_description_text">
                    <p>
                        We are looking for a Digital Marketing Head cum Graphic Designer for our live shopping app. We plan to hire a part-time or a full time employee, freelancers won't do. Also there is a stiff requirement that you know Gujarati apart from Hindi and English. The company is based in Ahmedabad, Gujarat so you should be living here or willing to shift to the city.
                    </p>
                </div>
                <div class="job_skill_slider swiper">
                    <div class="swiper-button-prev">
                    </div>
                    <div class="swiper-wrapper">
                        <div class="job_skill swiper-slide"><a href="#">Graphic Design</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Adobe Illustrator</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Facebook</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Logo Design</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Social Media Imagery</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Instagram</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Brand Identity & Guidelines</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Photo Editing</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Web Design</a></div>
                        <div class="job_skill swiper-slide"><a href="#">Adobe Photoshop</a></div>
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
                    <small class="payment_verification_status verified_status" class="d-inline-flex">
                        <strong class="text-muted"><i class="fas fa-badge-check"></i> Verified</strong>
                    </small>
                    <small class="job_star_rating verified_rating">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                    </small>
                    <small class="job_location">
                        <span><i class="fas fa-map-marker-alt"></i>
                        Location
                        </span>
                    </small>
                    <small class="client-spendings" class="d-inline-block"><strong>$500+</strong> &nbsp;<span class="text-muted">spent</span></small>
                    <!-- <small class="connects-to-apply" class="d-none d-lg-inline-flex d-md-inline-flex text-muted">
                    Connects to apply:&nbsp;
                    <strong class="connect-price">1 Connects</strong></small> -->
                </div>
            </div>--}}
        </div>
    </div>
</div>
</div>
</section>



@endsection

@section('script')
<script async src="https://static.addtoany.com/menu/page.js"></script>
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



@endsection
