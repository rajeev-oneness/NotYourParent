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
                    <h4 class="job_list_title">
                        <a href="#">{{ $item->title }}</a>
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
                        <strong>Hourly  </strong>
                        <span>{{ $item->budget }}</span>
                        <span> - Est. Time: </span>
                        <span> - {{ $item->time }}</span>
                        <span> - Posted<span> &nbsp;{{ $item->created_at }} ago</span></span>
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
                        <strong data-test="proposals">{{ $item->user->count() }}</strong>
                    </small>
                </div>

                <div class="badge-line mt-10">
                    <small class="payment_verification_status" class="d-inline-flex">

                      {{-- <strong class="text-muted"><i class="fas fa-badge-check"></i> <i class="fas fa-times-circle"></i> Payment unverified</strong> --}}
                    </small>
                    <small class="job_star_raging">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                    </small>
                    <small class="job_location">
                        <span><i class="fas fa-map-marker-alt"></i>
                            {{ $job->location }}
                        </span>
                    </small>
                    <small class="client-spendings" class="d-inline-block"><strong>${{ $job->budget }}</strong> <span class="text-muted">spent</span></small>
                    <small class="connects-to-apply" class="d-none d-lg-inline-flex d-md-inline-flex text-muted">
                    Connects to apply:&nbsp;
                    <strong class="connect-price">1 Connects</strong></small>
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
