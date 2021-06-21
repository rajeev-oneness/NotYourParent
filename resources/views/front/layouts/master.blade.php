<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<!-- font awesome -->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<!-- owl.carousel -->
		<link rel="stylesheet" type="text/css" href="{{asset('front/css/owl.carousel.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('front/css/owl.theme.default.min.css')}}">
		<!-- custom -->
		<link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}">

        @yield('head-script-style')
		<title>:: Not Your Parent-@yield('title') ::</title>
	</head>
	<body>
        @include('front.layouts.header')
		<!-- main_header -->

        @yield('content')
        {{-- here goes the content --}}

		@include('front.layouts.footer')
		<!-- main_footer -->

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

		<script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('front/js/main.js')}}"></script>
        @yield('script')
	</body>
</html>