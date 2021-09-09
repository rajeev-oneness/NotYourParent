@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Articles
@endsection

@section('content')
<section class="recent_article_section about_recent_article_section">
    <div class="container">
        <div class="section_heading how_it_wrok_heading text-center">
            <h2 class="proxima_black text-uppercase white">Articles</h2>
            <p class="white proxima_light">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>

        <div class="row justify-content-center">
            @foreach ($data->articles as $article)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="recent_article_item">
                    <div class="recent_article_img">
                        <a class="d-block" href="{{route('front.articles.single', ['articleId' => $article->id])}}">
                            <img src="{{asset($article->image)}}">
                        </a>
                    </div>
                    <div class="recent_article_des">
                        <span class="article_date proxima_bold">{{date('d M,Y', strtotime($article->created_at))}}</span>
                        <h3 class="proxima_exbold"><a class="d-block" href="#">{{$article->title}}</a></h3>
                        <p class="darkgray">{{words($article->description, 20)}}</p>
                        <a href="{{route('front.articles.single', ['articleId' => $article->id])}}" class="secondary_btn darkblue_btn">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- recent_article_section -->
@endsection

@section('script')
    
@endsection