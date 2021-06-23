@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Knowledge Bank
@endsection

@section('content')


<!-- Knowledge Bank Section starts  -->
<section class="how_it_work_section" id="knowledge_bank">
    <div class="container position-relative">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">popular tricks</h2>
            <p class="proxima_light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore suscipit officia necessitatibus saepe! dolores voluptates praesentium.</p>
        </div>

        <div class="row">
            @for ($i = 1; $i <= 6; $i++)
            <div class="col-lg-4 col-md-6">
                <div class="darkblue clearfix knowledge_bank_cards">
                    <div class="white new text-uppercase text-center">new</div>
                    <h3 class="proxima_bold">Lorem Ipsum Dolor</h3>
                    <h6 class="proxima_bold">Morbi consequat semper nunc mollis accumsun enim</h6>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, sint debitis eius odit voluptatem amet mollitia?</p>
                    <a class="golden proxima_bold" href="{{route('front.knowledge-bank', ['detailId' => $i])}}">Read More</a>
                </div>
            </div>
            @endfor
        </div>

        <div class="how_ite_works_plane">
            <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
        </div>
    </div>			
</section>
<!-- Knowledge Bank Section Ends -->


@endsection

@section('script')
    
@endsection