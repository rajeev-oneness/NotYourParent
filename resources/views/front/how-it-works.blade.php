@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    How it works
@endsection

@section('content')
<!-- How it works section starts  -->
<section class="how_it_work_section">
    <div class="container position-relative">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">How It Works</h2>
            <p class="proxima_light">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>

        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="how_it_work_img">
                    <img src="{{asset('front/images/how-it-work.png')}}">
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="how_it_work_content">
                    <h2 class="proxima_black green"><strong class="darkblue">Learn A</strong><br>Skillset <sub class="darkblue">In</sub><br><span class="black"><b class="golden">10</b> Minutes</span></h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p>
                    <div class="our_process_wrap">
                        <div class="row">
                            <div class="col-3">
                                <div class="our_process_item">
                                    <div class="our_process_img">
                                        <img src="{{asset('front/images/sign_up.png')}}">
                                    </div>
                                    <h4 class="text-uppercase proxima_exbold black">Sign Up</h4>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="our_process_item">
                                    <div class="our_process_img">
                                        <img src="{{asset('front/images/search_expart.png')}}">
                                    </div>
                                    <h4 class="text-uppercase proxima_exbold black">Search Expert</h4>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="our_process_item">
                                    <div class="our_process_img">
                                        <img src="{{asset('front/images/join-class.png')}}">
                                    </div>
                                    <h4 class="text-uppercase proxima_exbold black">Join a Class</h4>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="our_process_item">
                                    <div class="our_process_img">
                                        <img src="{{asset('front/images/learn_enjoy.png')}}">
                                    </div>
                                    <h4 class="text-uppercase proxima_exbold black">Learn & Enjoy</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('front.sign-up',['userType' => 3])}}#join-now" class="parimary_btn darkblue_btn">Get started</a>
                </div>
            </div>
        </div>

        <div class="how_ite_works_plane">
            <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
        </div>
    </div>			
</section>
<!-- How it works section ends  -->
@endsection

@section('script')
    
@endsection