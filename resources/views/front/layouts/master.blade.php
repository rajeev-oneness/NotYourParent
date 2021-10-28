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

		<!-- stripe Payement -->
		<div class="modal fade align-modal" id="stripePaymentModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="stripePaymentModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="stripePaymentModalLabel">Stripe payment gateway</h5>
						<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button> -->
					</div>
					<div class="modal-body">
						<form role="form" action="{{ route('stripe.payment.store') }}" method="POST" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_test_TYooMQauvdEDq54NiTphI7jx" id="payment-form">
						@csrf
							<div class="row">
								<div class="col-12 required">
									<label for="">Name on the card</label>
									<input type="text" value="Test" class="form-control form-control-sm" placeholder="Name on the card" size='4'>
								</div>
							</div>

							<div class="row">
								<div class="col-12 border-0 mt-2 card required">
									<label for="">Card number</label>
									<input type="text" value="4242424242424242" class="form-control form-control-sm card-number" placeholder="Card number" size='20'>
								</div>
							</div>

							<div class="row">
								<div class="col-6 cvc required">
									<label for="">CVC</label>
									<input type="text" value="123" class="form-control form-control-sm mr-2 card-cvc" placeholder="CVC">
								</div>
								<div class="col-6 expiration required">
									<label for="">Expiry</label>
									<div class="d-flex">
										<input type="text" value="{{date('m',strtotime('+1 month'))}}" class="form-control form-control-sm mr-2 card-expiry-month" placeholder="MM" size='2'>
										<input type="text" value="{{date('Y',strtotime('+1 year'))}}" class="form-control form-control-sm card-expiry-year" placeholder="YYYY" size='4'>
									</div>
								</div>
							</div>

							<div class="row mt-2">
								<div class="col-12 error hide">
									<p class="text-danger" style="font-size: 12px">@error('stripePaymentGateway'){{$message}}@enderror<!-- Please correct the errors and try again.--></p>
								</div>
							</div>

							<div class="row mt-3">
								<div class="col-12 text-right">
									<a type="button" class="" data-dismiss="modal">Cancel</a>
									<button type="submit" class="btn btn-sm btn-primary">Pay (<span class="currencySymbolToPay">$</span><span class="amountToPay">0.00</span>)</button>
								</div>
							</div>
							{{-- <p class="small">This payment is processed by Stripe Payment gateway</p> --}}
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- stripe Payment End -->

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
		<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
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
			var slotId = 0, courseId = 0;
			function bookSessionModal(date, id, time, note = null) {
				slotId = id;
				$('#sessionDate').html(date);
				$('#sessionslotId').val(id);
				$('#sessionTime').html(time);
				$('#sessionNote').html(note);
				$('#bookSessionModal').modal('show');
			}

			// payment modal 2 - CASE STUDY BOOK
			function bookCaseStudyModal(amount) {
				$('.courseAmount').text(amount);
				$('#courseFormAmountId').val(amount);
				$('#coursePurchaseModal').modal('show');
			}

			// strpe payment gateway starts
			function currencySymbol($type = ''){
				$view = '$';
				switch ($type) {
					case 'gbp':$view = '£';break;
					case 'usd':$view = '$';break;
					case 'eur':$view = '€';break;
					case 'euro':$view = '€';break;
					default:$view = '$';break;
				}
				return $view;
			}

			var stripePrice = 0,redirectURL = '',currencyToPayment = 'usd';
			function stripePaymentStart(price, redirectionURL, currency = 'usd',type = ''){
				if(parseInt(price) < 1){
					alert('Price must be at least '+ currencySymbol(currency) +' 1')
				}else{
					stripePrice = price;redirectURL = redirectionURL;currencyToPayment = currency;
					if(type == 'video'){
						redirectURL += '/'+slotId;
					}
					//  else if (type == 'course') {
					// 	redirectURL += '/'+courseId;
					// }
					$('.currencySymbolToPay').text(currencySymbol(currency));
					$('.amountToPay').text(price);
					$('#bookSessionModal').modal('hide');
					$('#coursePurchaseModal').modal('hide');
					$('#stripePaymentModal').modal('show');
				}
			}

			$(function () {
				var $form = $(".require-validation");
				$('form.require-validation').bind('submit', function (e) {
					var $form = $(".require-validation"),
						inputSelector = ['input[type=email]', 'input[type=password]',
							'input[type=text]', 'input[type=file]',
							'textarea'
						].join(', '),
						$inputs = $form.find('.required').find(inputSelector),
						$errorMessage = $form.find('div.error'),
						valid = true;
					$errorMessage.addClass('hide');

					$('.has-error').removeClass('has-error');
					$inputs.each(function (i, el) {
						var $input = $(el);
						if ($input.val() === '') {
							$input.parent().addClass('has-error');
							$errorMessage.removeClass('hide');
							e.preventDefault();
						}
					});

					if (!$form.data('cc-on-file')) {
						e.preventDefault();
						Stripe.setPublishableKey($form.data('stripe-publishable-key'));
						Stripe.createToken({
							number: $('.card-number').val(),
							cvc: $('.card-cvc').val(),
							exp_month: $('.card-expiry-month').val(),
							exp_year: $('.card-expiry-year').val()
						}, stripeResponseHandler);
					}
				});

				function stripeResponseHandler(status, response) {
					if (response.error) {
						$('.loading-data').hide();$('button').attr('disabled', false);
						$('.error').removeClass('hide').find('.text-danger').text(response.error.message);
					} else {
						// token contains id, last4, and card type
						var token = response['id'];
						// insert the token into the form so it gets submitted to the server
						$form.find('input[type=text]').empty();
						$form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
						$form.append("<input type='hidden' name='amount' value='" + stripePrice + "'/>");
						$form.append("<input type='hidden' name='redirectURL' value='" + redirectURL + "'/>");
						$form.append("<input type='hidden' name='currency' value='" + currencyToPayment + "'/>");
						$form.get(0).submit();
					}
				}
			});
			// strpe payment gateway ends
    	</script>
        @yield('script')
	</body>
</html>