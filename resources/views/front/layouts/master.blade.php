<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
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
		<script src="{{asset('design/js/sweetalert.min.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.14/moment-timezone-with-data-2012-2022.min.js"></script>
		<script>
			$('#expert_input').on('keyup', function() {
				var val = $(this).val();
				if (val.length > 1) {
					$.ajax({
						url: "{{ route('front.home.search') }}",
						method: "POST",
						dataType: 'json',
						data: {
							token: "{{ csrf_token() }}",
							value: val,
						},
						beforeSend: function() {
							// console.log(val);
						},
						success: function(response) {
							if(response.data.length > 0) {
								var result = '';
								result += '<div class="list-group">';

								$.each(response.data, function(i, val) {
									var topic = '';
									var url = '{{route("front.experts.single",':id')}}';
									url = url.replace(':id',val.id);

									if (val.topic_name !== null) {
										topic = '<p class="topic-name">'+val.topic_name+'</p>';
									}

									result += '<a href="'+url+'" class="list-group-item list-group-item-action"><div class="d-flex"><div class="exp_img_holder mr-3"><img src="'+val.image+'" alt="expert-image" class="search_expert_image"></div><div class="exp_details_holder"><h6 class="mb-0">'+val.name+' - Expert in '+val.primary_category+'</h6>'+topic+'</div></div></a>';
								})

								result += '</div>';
								$('#search_result').html(result).show();
							} else {
								var result = '';
								result += '<div class="list-group">';

								result += '<a href="javascript: void(0)" class="list-group-item list-group-item-action"><h6 class="mb-0">No results found</h6><p class="topic-name"> Try other keyword</p></a>';

								result += '</div>';
								$('#search_result').html(result).show();
							}
						}
					});
				} else {
					$('#search_result').html('').hide();
				}
			});

			//sweetalert
			@if(Session::has('Success'))
				swal('Success','{{Session::get('Success')}}', 'success');
			@elseif(Session::has('Errors'))
				swal('Error','{{Session::get('Errors')}}', 'error');
			@endif

			//local timezone
			console.log(moment.tz.guess());

			// payment modal 1 - VIDEO SESSION BOOK
			function bookSessionModal(date, id, time, note = null) {
				$('#sessionDate').html(date);
				$('#sessionslotId').val(id);
				$('#sessionTime').html(time);
				$('#sessionNote').html(note);
				$('#bookSessionModal').modal('show');
			}

			// payment modal 2 - CASE STUDY BOOK
			function bookCaseStudyModal(amount) {
				$('.courseAmount').text(amount);
				$('#courseId').val(amount);
				$('#courseFormAmountId').val(amount);
				$('#coursePurchaseModal').modal('show');
			}
    	</script>
        @yield('script')
	</body>
</html>