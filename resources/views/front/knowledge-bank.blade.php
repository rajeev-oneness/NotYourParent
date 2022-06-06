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
            <h2 class="proxima_black text-uppercase darkblue">knowledge bank</h2>
            <p class="proxima_light">Knowledge bank consists of IN-HOUSE & EXPERT CONTENTS to share their knowledge accordingly</p>
        </div>

        <div class="row mb-5">
            @php
                $allClass = $inHouseClass = $expertrClass = 'btn-primary ';
                if (empty($_GET['content'])) {
                    $allClass .= 'active';
                } else {
                    if ($_GET['content'] == 'in-house') {
                        $inHouseClass .= 'active';
                    } else {
                        $expertrClass .= 'active';
                    }
                }
            @endphp
            <div class="col-12 text-right">
                <a href="{{route('front.knowledge-bank')}}" class="btn btn-sm {{ $allClass }}">All</a>

                <a href="{{route('front.knowledge-bank', ['content' => 'in-house'])}}" class="btn btn-sm {{ $inHouseClass }}">In-house Content</a>

                <a href="{{route('front.knowledge-bank', ['content' => 'expert'])}}" class="btn btn-sm {{ $expertrClass }}">Expert Content</a>
            </div>
        </div>

        <div class="row">
            @foreach($knowledgebank as $item)
            <div class="col-lg-4 col-md-6">
                <div class="darkblue clearfix knowledge_bank_cards">
                    @if (!empty($item->image))
                        <div class="img__holder">
                            <img src="{{ asset($item->image) }}" alt="image">
                        </div>
                    @endif
                    <div class="desc_holder">
                        <div class="white new text-uppercase text-center">{{ $item->name }}</div>
                        <h3 class="proxima_bold">{{ words($item->title, 7) }}</h3>
                        <h6 class="proxima_bold">{{ $item->subtitle }}</h6>
                        <p>{!! words($item->description, 20) !!}</p>
                        <a class="golden proxima_bold" href="{{route('front.knowledge-bank', ['detailId' => $item->id])}}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
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
