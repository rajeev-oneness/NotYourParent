@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Resources
@endsection

@section('content')
<section class="inner_banner_section resource_banner" style="background-image: url({{asset('front/images/resource-page-banner.jpg')}});">
    <div class="container">					
        <div class="resource_banner_content text-center">
            <h1 class="text-uppercase darkblue proxima_bold">Recent <span class="proxima_black golden">articles</span></h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially</p>
        </div>
    </div>
</section>
<!-- banner_section -->

<section class="experty_insights_panel">
    <div class="container position-relative">
        <div class="section_heading experty_insights_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">EXPERT INSIGHTS</h2>
            <p class="proxima_light">Donec orci nisl, porttitor vel consequat vitae, aliquet vel sapien. Sed et posuere libero, in vulputate nibh sed ut ornare dolor liquam nisi enim, condimentum suscipit lobortis.</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="experty_insights_item">
                    <div class="experty_insights_img">
                        <img src="{{asset('front/images/resource/resource-img-1.jpg')}}">
                    </div>
                    <div class="experty_insights_content">
                        <span class="experty_insights_date">10 March, 2020</span>
                        <h3 class="proxima_bold darkblue">Morbi consequat semper nunc mollis accumsan enim.</h3>
                        <p class="darkgray">Morbi consequat semper nunc, mollis accumsa enim molestie tem. Sed cursus justo ac quam pretium, lacinia porttitor velit aliquam.</p>
                        <a href="javascript:void(0);">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="experty_insights_item">
                    <div class="experty_insights_img">
                        <img src="{{asset('front/images/resource/resource-img-2.jpg')}}">
                    </div>
                    <div class="experty_insights_content">
                        <span class="experty_insights_date">10 March, 2020</span>
                        <h3 class="proxima_bold darkblue">Morbi consequat semper nunc mollis accumsan enim.</h3>
                        <p class="darkgray">Morbi consequat semper nunc, mollis accumsa enim molestie tem. Sed cursus justo ac quam pretium, lacinia porttitor velit aliquam.</p>
                        <a href="javascript:void(0);">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="experty_insights_item">
                    <div class="experty_insights_img">
                        <img src="{{asset('front/images/resource/resource-img-3.jpg')}}">
                    </div>
                    <div class="experty_insights_content">
                        <span class="experty_insights_date">10 March, 2020</span>
                        <h3 class="proxima_bold darkblue">Morbi consequat semper nunc mollis accumsan enim.</h3>
                        <p class="darkgray">Morbi consequat semper nunc, mollis accumsa enim molestie tem. Sed cursus justo ac quam pretium, lacinia porttitor velit aliquam.</p>
                        <a href="javascript:void(0);">Read More</a>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="experty_insights_item">
                    <div class="experty_insights_img">
                        <img src="{{asset('front/images/resource/resource-img-4.jpg')}}">
                    </div>
                    <div class="experty_insights_content">
                        <span class="experty_insights_date">10 March, 2020</span>
                        <h3 class="proxima_bold darkblue">Morbi consequat semper nunc mollis accumsan enim.</h3>
                        <p class="darkgray">Morbi consequat semper nunc, mollis accumsa enim molestie tem. Sed cursus justo ac quam pretium, lacinia porttitor velit aliquam.</p>
                        <a href="javascript:void(0);">Read More</a>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="experty_insights_item">
                    <div class="experty_insights_img">
                        <img src="{{asset('front/images/resource/resource-img-5.jpg')}}">
                    </div>
                    <div class="experty_insights_content">
                        <span class="experty_insights_date">10 March, 2020</span>
                        <h3 class="proxima_bold darkblue">Morbi consequat semper nunc mollis accumsan enim.</h3>
                        <p class="darkgray">Morbi consequat semper nunc, mollis accumsa enim molestie tem. Sed cursus justo ac quam pretium, lacinia porttitor velit aliquam.</p>
                        <a href="javascript:void(0);">Read More</a>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="experty_insights_item">
                    <div class="experty_insights_img">
                        <img src="{{asset('front/images/resource/resource-img-6.jpg')}}">
                    </div>
                    <div class="experty_insights_content">
                        <span class="experty_insights_date">10 March, 2020</span>
                        <h3 class="proxima_bold darkblue">Morbi consequat semper nunc mollis accumsan enim.</h3>
                        <p class="darkgray">Morbi consequat semper nunc, mollis accumsa enim molestie tem. Sed cursus justo ac quam pretium, lacinia porttitor velit aliquam.</p>
                        <a href="javascript:void(0);">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="experty_insights_item">
                    <div class="experty_insights_img">
                        <img src="{{asset('front/images/resource/resource-img-7.jpg')}}">
                    </div>
                    <div class="experty_insights_content">
                        <span class="experty_insights_date">10 March, 2020</span>
                        <h3 class="proxima_bold darkblue">Morbi consequat semper nunc mollis accumsan enim.</h3>
                        <p class="darkgray">Morbi consequat semper nunc, mollis accumsa enim molestie tem. Sed cursus justo ac quam pretium, lacinia porttitor velit aliquam.</p>
                        <a href="javascript:void(0);">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="experty_insights_item">
                    <div class="experty_insights_img">
                        <img src="{{asset('front/images/resource/resource-img-8.jpg')}}">
                    </div>
                    <div class="experty_insights_content">
                        <span class="experty_insights_date">10 March, 2020</span>
                        <h3 class="proxima_bold darkblue">Morbi consequat semper nunc mollis accumsan enim.</h3>
                        <p class="darkgray">Morbi consequat semper nunc, mollis accumsa enim molestie tem. Sed cursus justo ac quam pretium, lacinia porttitor velit aliquam.</p>
                        <a href="javascript:void(0);">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="experty_insights_item">
                    <div class="experty_insights_img">
                        <img src="{{asset('front/images/resource/resource-img-9.jpg')}}">
                    </div>
                    <div class="experty_insights_content">
                        <span class="experty_insights_date">10 March, 2020</span>
                        <h3 class="proxima_bold darkblue">Morbi consequat semper nunc mollis accumsan enim.</h3>
                        <p class="darkgray">Morbi consequat semper nunc, mollis accumsa enim molestie tem. Sed cursus justo ac quam pretium, lacinia porttitor velit aliquam.</p>
                        <a href="javascript:void(0);">Read More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="experty_insights_loadmore text-center">
            <a href="javascript:void(0);" class="parimary_btn green_btn">LOAD MORE</a>
        </div>
        <div class="experty_insights_plane">
            <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
        </div>
    </div>
</section>
@endsection

@section('script')
    
@endsection