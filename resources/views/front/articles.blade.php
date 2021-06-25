@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Articles
@endsection

@section('content')
<section class="how_it_work_section" id="article">
    <div class="container position-relative">
        
        <div class="detail_text">
            <h4 class="darkblue mb-3">{{date('d M, Y', strtotime($article->created_at))}}</h4>
            <h1 class="text-uppercase darkblue proxima_exbold">{{$article->title}}</h1>
        </div>
        <article>
            <div class="article_left">
                <img src="{{asset($article->image)}}" alt="">
                <div class="tags">
                    <p>Tags :</p>
                    @forelse ($articleTags as $articleTag)
                    <a class="photo-tag" href="javascript:void(0);">{{$articleTag->tagName->name}}</a>
                    @empty
                        Not Found!
                    @endforelse
                </div>
            </div>
            <div class="article_right">
                {!!$article->description!!}
            </div>
        </article>
        <div class="about_writer">
            <div class="writer-img">
                <img src="{{asset($article->author->image)}}" alt="">
            </div>
            <div class="writer-text">
                <h5>{{$article->author->name}}</h5>
                <p>Posted on {{date('d M, Y ( h:ia )', strtotime($article->created_at))}}</p>
                {{-- <ul>
                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fa fa-pinterest"></span></a></li>
                    <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                </ul> --}}
            </div>
        </div>

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
            @forelse ($randomArticles as $randomArticle)
            <div class="mentor_course">
                <div class="experty_insights_item">
                    <div class="experty_insights_img">
                        <img src="{{asset($randomArticle->image)}}">
                    </div>
                    <div class="experty_insights_content">
                        <span class="experty_insights_date">{{date('d M, Y', strtotime($randomArticle->created_at))}}</span>
                        <h3 class="proxima_bold darkblue">{{$randomArticle->title}}</h3>
                        <p class="darkgray">{!!$randomArticle->description!!}</p>
                        <a href="{{route('front.articles', ['articleId' => $randomArticle->id])}}">Read More</a>
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
@endsection

@section('script')
    
@endsection