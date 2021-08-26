@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Categories
@endsection

@section('content')

<section id="categories_section" class="banner_section" style="background-image: url({{asset('front/images/categories-banner.png')}});">
	<div class="container position-relative">					
		<div class="banner_content">
			<h1 class="text-uppercase proxima_bold">TOP <br><strong class="proxima_black">CATEGORIES</strong></h1>

			<div class="dropdown banner_search_box">
				<button class="darkblue proxima_bold dropdown-toggle banner_search_field" type="button" data-toggle="dropdown">All Categories</button>
				<ul class="dropdown-menu custom_dropdown_menu">
				  @foreach ($categories as $category)
					  <li><a href="{{route('directory.search.ajax', ['categoryId' => $category->id])}}">{{$category->name}}</a></li>
				  @endforeach
				</ul>
				<input class="banner_search_btn parimary_btn green_btn" type="button" value="Join Live Classes" name="">
				<input class="banner_search_btn parimary_btn darkblue_btn" type="button" value="Free Visit" name="">
			  </div>

		</div>
		
	<img class="puz" src="{{asset('front/images/puz.png')}}" alt="">
	</div>
</section>
<!-- banner_section -->


<section class="position-relative directory_mentors_section">
	<div class="container">
		<div class="section_heading how_it_wrok_heading text-center">
			<h2 class="proxima_black text-uppercase darkblue">Top Categories</h2>
			<p class="darkgray proxima_light">Greater Pittsburgh's Expert Basement Waterproofing & Foundation Repair Contractor</p>
		</div>
		<div class="row">
			@foreach($categories as $category)
			<div class="col-lg-4 col-md-6">
				<div class="mentor_course">
						<div class="mentor_course_img">
							<img src="{{asset('front/images/mentor-img-1.jpg')}}">
							<div class="mentor_course_overlay">
								<h4 class="white proxima_exbold text-uppercase"><sub class="proxima_normal">Let’s</sub> Learn some</h4>
								<h3 class="green proxima_exbold text-uppercase">Lorem Ipsum</h3>
								<ul>
									<li class="mentor_time"><img src="{{asset('front/images/time_icon.png')}}"> 15 minutes</li>
									<li class="mentor_price">30$ <span>Only</span></li>
								</ul>
							</div>
						</div>
						<div class="mentor_course_content">
							<div class="mentor_course_review">
								<div class="mentor_course_review_img">
									<img src="{{asset('front/images/testimonial-image-female.jpg')}}">
								</div>
								<div class="mentor_course_review_name">
									<h5>{{ $category->name }}</h5>
									<h6>Fashion Expert</h6>
								</div>
							</div>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum.Ipsum is simply dummy text of the printing.</p>
							<ul>
								<li><a href="#">Consult Now</a></li>
								<li><a href="#">Visit Profile</a></li>
							</ul>
						</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="mentors_section_plane">
		<img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
	</div>
</section>

@endsection

@section('script')
    
@endsection