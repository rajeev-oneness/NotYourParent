@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Sign Up
@endsection

@section('content')
<section class="inner_banner_section resource_banner sign_up_banner"
	style="background-image: url({{asset('front/images/sign-up-banner.jpg')}});">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-12 align-self-center">
				<div class="resource_banner_content">
					<h1 class="text-uppercase darkblue proxima_bold">BECOME <br><span
							class="proxima_black golden">{{ $data['userType'] == 3 ? 'A STUDENT' : 'AN EXPERT' }}</span></h1>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
						been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
						galley acof type and scrambled it to make a type specimen book.</p>
					<a href="#join-now" class="green_btn parimary_btn">Join now</a>
				</div>
			</div>

			<div class="col-md-7 col-sm-12 align-self-center">
				<div class="sign_up_banner_img">
					<img class="img-fluid" src="{{asset('front/images/sign-up-banner.png')}}">
				</div>
			</div>
		</div>
	</div>
</section>
<!-- banner_section -->


<!-- sign_up_form_section -->
<section class="main_sign_up" id="join-now">
	<div class="container">
		<div class="sign_up_form">
			<!--left form card-->
			<div class="form-container">
				<h4>{{ $data['userType'] == 3 ? 'STUDENT' : 'EXPERT' }} ONLINE WITH</h4>
				<h3>NOT YOUR PARENT</h3>
				<form method="POST" action="{{ route('register') }}">
					@csrf
					<input type="hidden" name="user_type" value="{{$data['userType']}}">
					@error('user_type')
						<span class="text-danger"><small>{{$message}}</small></span>
					@enderror

					@error('referral')
						<span class="text-danger"><small>{{$message}}</small></span>
					@enderror
					<input class="email" type="text" name="referral" placeholder="Referral Code (if any)" value="{{old('referral')}}">

					@error('name')
						<span class="text-danger"><small>{{$message}}</small></span>
					@enderror
					<input class="email" type="text" name="name" placeholder="Full Name" value="{{old('name')}}">

					@error('email')
						<span class="text-danger"><small>{{$message}}</small></span>
					@enderror
					<input class="email" type="email" name="email" placeholder="Email Address"  value="{{old('email')}}" >

					@error('mobile')
						<span class="text-danger"><small>{{$message}}</small></span>
					@enderror
					<input class="email" type="text" name="mobile" placeholder="Phone number"  value="{{old('mobile')}}" >

					@if($data['userType'] == 2)
						@error('primary_category')
							<span class="text-danger"><small>{{$message}}</small></span>
						@enderror
						<select name="primary_category" class="email" required>
							<option value="" selected disabled>Select primary category</option>
							@foreach ($categories as $item)
								<option value="{{$item->id}}">{{$item->name}}</option>
							@endforeach
						</select>
					@else
						<input type="hidden" name="primary_category" value="0">
					@endif

					@error('password')
						<span class="text-danger"><small>{{$message}}</small></span>
					@enderror
					<input class="pass" type="password" name="password" placeholder="Password">
					<input class="cpass" type="password" name="password_confirmation" placeholder="Confirm Password">
					<div class="agreement">
						<input class="check" type="checkbox" required>
						<p>I agree that my submitted data is being collected and stored.</p>
					</div>
					<input class="sign_up_btn" type="submit" value="SIGN UP">
				</form>
			</div>
			<span class="form-dots-top"><img class="img-fluid" src="{{asset('front/images/dots-bg.png')}}" alt=""></span>
			<span class="form-dots-bottom"><img class="img-fluid" src="{{asset('front/images/dots-bg.png')}}" alt=""></span>
			<span class="form-bg"><img class="img-fluid" src="{{asset('front/images/form-bg.svg')}}" alt=""></span>
		</div>
		<div class="sign_up_text">
			<h2 class="green">
				<span class="darkblue">Let's </span><br>
				Sign Up <span class="darkblue">&</span><br>
			</h2>
			<h2 class="h2">Become <span class="golden"> {{ $data['userType'] == 2 ? 'A EXPERT' : 'A Student' }} </span></h2>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, ab sunt eveniet laudantium optio,
				ipsa itaque, quos non ipsum quas repellat! Esse debitis adipisci assumenda dicta, mollitia,
				molestiae.</p>
		</div>
	</div>
	<img class="sign_up_plane" src="{{asset('front/images/how_it_work_plane.png')}}" alt="">
</section>
<!-- sign_up_form_section -->


<!-- mentor section start-->
<section class="mentors_section">
	<div class="container">
		<div class="section_heading how_it_wrok_heading text-center">
			<h2 class="proxima_black text-uppercase white">WHAT OTHER EXPERTS SAY</h2>
			<p class="white proxima_light">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
		</div>

		<div class="mentor_tab_content_wrap">
			<div class="tab_content" id="Testimonials">
				<div class="testimonials_slider owl-carousel owl-theme">
					<div class="testimonials">
						<div class="testimonials-img">
							<img class="clients" src="{{asset('front/images/testimonial-image-female.jpg')}}" alt="Reviewer's image">
						</div>
						<h3 class="darkblue text-uppercase">Yasmain Marlly</h3>
						<h6>Charlotte. NC</h6>
						<img src="{{asset('front/images/reviews_star.png')}}" alt="">
						<p>I had some moisture issues in my crawl space and had several companies come out for
							estimates. I had to solve the problem with a very limited budget & most estimate were
							proposing quite extensive work & a huge price tag. Moisture Loc came up with a very
							simple and very affordable solution to the problem and did the work in a timely and
							professional manner. I will recommend Moisture Loc to my friends and neighbors.
						</p>
					</div>

					<div class="testimonials">
						<div class="testimonials-img">
							<img class="clients" src="{{asset('front/images/testimonial-image-female.jpg')}}" alt="Reviewer's image">
						</div>
						<h3 class="darkblue text-uppercase">Yasmain Marlly</h3>
						<h6>Charlotte. NC</h6>
						<img src="{{asset('front/images/reviews_star.png')}}" alt="">
						<p>I had some moisture issues in my crawl space and had several companies come out for
							estimates. I had to solve the problem with a very limited budget & most estimate were
							proposing quite extensive work & a huge price tag. Moisture Loc came up with a very
							simple and very affordable solution to the problem and did the work in a timely and
							professional manner. I will recommend Moisture Loc to my friends and neighbors.
						</p>
					</div>

					<div class="testimonials">
						<div class="testimonials-img">
							<img class="clients" src="{{asset('front/images/testimonial-image-female.jpg')}}" alt="Reviewer's image">
						</div>
						<h3 class="darkblue text-uppercase">Yasmain Marlly</h3>
						<h6>Charlotte. NC</h6>
						<img src="{{asset('front/images/reviews_star.png')}}" alt="">
						<p>I had some moisture issues in my crawl space and had several companies come out for
							estimates. I had to solve the problem with a very limited budget & most estimate were
							proposing quite extensive work & a huge price tag. Moisture Loc came up with a very
							simple and very affordable solution to the problem and did the work in a timely and
							professional manner. I will recommend Moisture Loc to my friends and neighbors.
						</p>
					</div>
					<div class="testimonials">
						<div class="testimonials-img">
							<img class="clients" src="{{asset('front/images/testimonial-image-female.jpg')}}" alt="Reviewer's image">
						</div>
						<h3 class="darkblue text-uppercase">Yasmain Marlly</h3>
						<h6>Charlotte. NC</h6>
						<img src="{{asset('front/images/reviews_star.png')}}" alt="">
						<p>I had some moisture issues in my crawl space and had several companies come out for
							estimates. I had to solve the problem with a very limited budget & most estimate were
							proposing quite extensive work & a huge price tag. Moisture Loc came up with a very
							simple and very affordable solution to the problem and did the work in a timely and
							professional manner. I will recommend Moisture Loc to my friends and neighbors.
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="text-center view_all_mentor">
			<a href="#" class="green_btn parimary_btn">EXPLORE ALL</a>
		</div>
	</div>
	<div class="mentors_section_plane">
		<img class="img-fluid" src="{{asset('front/images/member-plane.png')}}">
	</div>
</section>
<!-- mentor section end -->
@endsection

@section('script')
    
@endsection