@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Case studies single
@endsection

@section('content')
<section class="how_it_work_section" style="padding: 250px 0;">
    <div class="container position-relative">
        <article>
            <div class="article_left">
                <img src="{{asset($course->image)}}" alt="">

                <div class="purchase_holder mt-4">
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#purchase-modal">Purchase now &amp; Unlock video lesson</button>
                </div>
            </div>
            <div class="article_right">
                <span class="badge badge-primary mb-3"><h5 class="mb-0">{{$course->category_name}}</h5></span>
                <h1 class="text-uppercase darkblue proxima_exbold">{{$course->name}}</h1>

                <h5><em>Case study by {{$course->teacherDetail->name}}</em></h5>

                <div class="banner_content my-3">
                    <h1 class="text-uppercase proxima_bold" style="font-size: 25px;"><strong class="proxima_black" style="font-size: 25px;">DURATION</strong> {{$course->duration}} minutes</h1>
                    <h1 class="text-uppercase proxima_bold" style="font-size: 25px;"><strong class="proxima_black" style="font-size: 25px;">PRICE</strong> ${{$course->price}}</h1>
                </div>
                {!!$course->description!!}
            </div>
        </article>

        <div class="how_ite_works_plane">
            <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
        </div>
    </div>
</section>


<!-- People also like  -->
<section class="more_articles">
    <div class="container">
        <div class="section_heading experty_insights_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">You may also like</h2>
        </div>
        <div class="mentors_slider owl-carousel owl-theme">
            @forelse ($randomCourses as $item)
            <div class="mentor_course">
                <div class="experty_insights_item">
                    <div class="experty_insights_img">
                        <img src="{{asset($item->image)}}">
                    </div>
                    <div class="experty_insights_content">
                        <span class="experty_insights_date">{{date('d M, Y', strtotime($item->created_at))}}</span>
                        <h3 class="proxima_bold darkblue">{{$item->title}}</h3>
                        <p class="darkgray">{{words($course->description, 20)}}</p>
                        <a href="{{route('front.articles.single', ['articleId' => $item->id])}}">Read More</a>
                    </div>
                </div>
            </div>
            @empty
            <h4 class="proxima_black text-uppercase darkblue text-center">oops! No Data</h4>
            @endforelse
        </div>
    </div>
</section>
<!-- People also like  -->

<!-- Modal -->
<div class="modal fade" id="purchase-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Purchase this case study</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12"><h5><strong>Title</strong></h5></div>
                    <div class="col-md-12"><h4 class="text-muted">{{$course->name}}</h4></div>
                    <div class="col-md-12"><h5><strong>Duration</strong></h5></div>
                    <div class="col-md-12"><h4 class="text-muted">{{$course->duration}} minutes</h4></div>
                    <div class="col-md-12"><h5><strong>Price</strong></h5></div>
                    <div class="col-md-12"><h4 class="text-muted">${{$course->price}}</h4></div>
                    <div class="col-md-12"><em>Case study by {{$course->teacherDetail->name}}</em></div>
                    <div class="col-md-12 mt-3">
                        <button type="button" class="btn btn-primary">Confirm Purchase</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    
@endsection