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
                
                <div class="searchBox">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <h1> Your Post has been Successfully submitted</h1>
                            <h3> Go to <a href="{{route('front.my.jobs')}}">My Jobs</a></h3>
                </div>
                
            </div>
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
