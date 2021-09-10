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
                    <img src="{{asset($how_it_works_main->image)}}">
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="how_it_work_content">
                    <h2 class="proxima_black green"><strong class="darkblue">{{explodeCust($how_it_works_main->heading, 0).' '.explodeCust($how_it_works_main->heading, 1)}}</strong><br>{{explodeCust($how_it_works_main->heading, 2)}} <sub class="darkblue">{{explodeCust($how_it_works_main->heading, 3)}}</sub><br><span class="black"><b class="golden">{{explodeCust($how_it_works_main->heading, 4)}}</b> {{explodeCust($how_it_works_main->heading, 5)}}</span></h2>
                    <p>{{$how_it_works_main->description}}</p>

                    <div class="our_process_wrap">
                        <div class="row">
                            @foreach($how_it_works_child as $item)
                            <div class="col-3">
                                <a href="{{$item->link}}" class="d-block">
                                    <div class="our_process_item">
                                        <div class="our_process_img">
                                            <img src="{{asset($item->image)}}">
                                        </div>
                                        <h4 class="text-uppercase proxima_exbold black">{{$item->heading}}</h4>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{route('front.sign-up',['userType' => 3])}}" class="parimary_btn darkblue_btn">Get started</a>
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