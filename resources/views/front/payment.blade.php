<?php

	$token = (isset($_REQUEST['token']) && $_REQUEST['token']!='')?$_REQUEST['token']:'';
	$amount = (isset($_REQUEST['amount']) && $_REQUEST['amount']!='')?$_REQUEST['amount']*100:'';

	if($token!='' && $amount!=''){
		$apiKey = 'sk_test_51JXjzUSBEz1Fi9XLiLUDWrElrUU3vX5V8uV1Fq1wT6B0UTQYg1J5L3bvyI1eZnrgy7a9CXgsIZtvnA4PIKCAB6SW00LRNq6jRX';
			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => "https://api.stripe.com/v1/charges",
				CURLOPT_POST => 1,
				CURLOPT_HTTPHEADER => [
					"Authorization: Bearer " . $apiKey
				],
				CURLOPT_POSTFIELDS => http_build_query([
					"amount" => $amount,
					"currency" => 'usd',
					"source" => $token,
					"description" => "Payment from website"
				])
			]);
			$resp = curl_exec($curl);

			$RESP_ARR = json_decode($resp);

			if(isset($RESP_ARR->id)){
				//echo "payment is successful";
				$home_url = home_url('/thank-you-2');
				wp_redirect($home_url);
			}else{
				echo "<div class='alert_box'>payment is failed</div>";
				echo "<div class='clearfix'></div>";
			}
			curl_close($curl);
	}
	?>
<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap');
		body{
			font-family: 'Rajdhani', sans-serif;
			padding: 0;
		}
		.container{
			max-width: 1325px; margin: 0 auto;
			padding: 0 15px;
		}
		.clearfix {
			display: block;
			width: 100%;
			clear: both;
			height: 1px;
		}
		.alert_box {
			display: block;
			width: 100%;
			border: 1px solid;
			padding: 10px;
			text-align: center;
			color: #842029;
			background-color: #f8d7da;
			border-color: #f5c2c7;
			margin-bottom: 70px;
			clear: both;
			text-transform: capitalize;
			font-weight: bold;
		}

		/*Main css*/
		.pricing__system{
			display: flex;
			flex-wrap: wrap;
			margin-bottom: 30px;
		}
		.pricing__sys__block {
			flex: 0 0 100%;
			max-width: 33.33%;
			text-align: center;
			padding: 0 5px;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}
		.pricing__sys__block:last-child{
			border-right: none;
		}
		.pricing__sys__block input[type="radio"] {
			display: none;
		}
		.pricing__sys__block label {
			position: relative;
			display: block;
			padding: 10px;
			margin: 0 0 8px;
			cursor: pointer;
			border: 1px solid #ddd;
			border-radius: 5px;
			font-family: "Rajdhani", Sans-serif;
			font-weight: bold;
			font-size: 25px;
			z-index: 1;
			color:#fff;
			-webkit-transition: all .2s;
			transition: all .2s;
			color:#140251;
		}
		.pricing__sys__block input[type="radio"]:checked + label{
			border-color: #8A36FF;
			color:#fff;
		}
		.pricing__sys__block label span{
			font-size: 14px;
			font-weight: 600;
			display: block;
			line-height: 1;
			letter-spacing: 1px;
		}
		.pricing__sys__block label::after {
			position: absolute;
			content: '';
			top: 0;
			border-radius: 0;
			-webkit-transition: all .2s;
			transition: all .2s;
		}

		.pricing__sys__block label::after {
			opacity: 0;
			left:0;
			width: 100%;
			height: 100%;
			background: #8A36FF;
			z-index: -1;
			border-radius: 4px;
		}

		.pricing__sys__block input[type="radio"]:checked + label::after {
			opacity: 1;
		}
		.pricing__sys__block p{
			font-size: 16px;
			font-weight: 600;
			color: #000;
			margin: 0;
			line-height: 1;
			letter-spacing: 0.3px;
			font-family: "Rajdhani", Sans-serif;
		}

		.price__row{
			display: flex;
			flex-wrap: wrap;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			margin: 0 -15px;
		}
		.price__column{
			padding: 0 15px;
			flex: 0 0 100%;
			max-width: 33.33%;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}
		.price__block{
			background: #fff;
			border: 2px solid #000;
			box-shadow: 5px 5px 20px 0px rgba(0, 0, 0, 0.15);
			border-radius: 8px;
			padding: 30px 30px 45px 30px;
		}
		.price__block h3{
			margin: 0 0 10px;
			text-align: center;
			font-size: 33px;
			letter-spacing: 0;
			line-height: 1.2;
			color: #140251;
			font-weight: 700;
			text-transform: none;
			font-family: "Rajdhani", Sans-serif;
		}
		.price__block h5{
			font-size: 22px;
			font-weight: 400;
			text-transform: none;
			line-height: 1.2em;
			letter-spacing: 0px;
			color: #140251;
			margin: 0 0 35px;
			padding-bottom: 30px;
			text-align: center;
			position: relative;
			font-family: "Rajdhani", Sans-serif;
		}
		.price__block h5:before{
			content: "";
			height: 2px;
			width: 90%;
			position: absolute;
			left: 0;
			right: 0;
			margin: 0 auto;
			background: #8a36ff6b;
			bottom: 0;
		}
		.price__column:nth-child(2) .price__block{
			-webkit-box-shadow: 2px 4px 0px 1px rgb(0, 0, 0, 0.95);
			box-shadow: 2px 4px 0px 1px rgb(0, 0, 0, 0.95);
			margin-top: -30px;
		}
		.price__block__body{
			padding-bottom: 10px;
		}
		.price__block__body ul{
			margin: 0;
			padding: 0;
			list-style: none;
		}
		.price__block__body li{
			display: flex;
			flex-wrap: wrap;
			margin-bottom: 20px;
			font-size: 17px;
			color: #343434;
			line-height: 1.4;
			font-weight: 500;
			font-family: "Rajdhani", Sans-serif;
		}
		.price__block__body li .price__icon{
			flex: 0 0 100%;
			max-width: 25px;
			align-self: self-start;
		}
		.price__block__body li .price__icon svg{
			width: 100%;
			display: block;
		}
		.price__block__body li .price__body_text {
			-ms-flex-preferred-size: 0;
			flex-basis: 0;
			-ms-flex-positive: 1;
			flex-grow: 1;
			max-width: 100%;
			padding-left: 15px;
			align-self: center;
		}
		.price_btn_wrap{
			text-align: center;
		}
		.price_btn_wrap{
			text-align: center;
		}
		.price_btn {
			background: #8a36ff;
			padding: 18px 65px 18px 25px;
			border-radius: 8px;
			text-decoration: none;
			font-weight: 600;
			color: #fff;
			font-size: 17px;
			letter-spacing: 0.5px;
			line-height: 1.1;
			display: inline-block;
			font-family: "Rajdhani", Sans-serif;
			border: none;
		}
		.price_btn:hover{
			background: #a020f0;
			color: #fff;
		}
		.price__column:nth-child(2) .price__block .price_btn {
			background: #a020f0;
		}
		.price__column:nth-child(2) .price__block .price_btn:hover {
			background: #8a36ff;
		}
		.price_btn svg{
			padding-right: 30px;
			fill: #fff;
		}
		.number_of_user{
			flex-wrap: wrap;
			display: flex;
			margin-bottom: 30px;
			justify-content: center;
		}
		.number_of_user h6{
			font-size: 18px;
			font-weight: 600;
			align-self: center;
			-ms-flex: 0 0 auto;
			flex: 0 0 auto;
			width: auto;
			margin: 0 15px 0 0;
			max-width: 100%;
			font-family: "Rajdhani", Sans-serif;
		}
		.number_of_user input {
			margin-bottom: 0;
		}
		.swal2-container {
			z-index: 9999 !important;
		}
		.number_of_user input[type=number]{
			flex: 0 0 100%;
			max-width: 100px;
			text-align: center;
			align-self: center;
			height: 40px;
			border-radius: 4px;
			border: 1px solid #14025142;
			font-size: 17px;
			font-weight: 500;
			font-family: "Rajdhani", Sans-serif;
			padding: 5px 10px;
			box-sizing: border-box;
		}
		.number_of_user input[type=number]:focus{
			outline: none;
		}

	.payment__modale {
		overflow-x: hidden;
		overflow-y: auto;
		padding: 40px 0;
		position: fixed;
		z-index: 9999;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		display:none ;
	}
	.closemodale {
		font-size: 40px;
		text-decoration: none;
		position: absolute;
		right: -8px;
		line-height: 43px;
		top: -10px;
		width: 40px;
		height: 40px;
		box-sizing: border-box;
		background: #fefefe;
		padding: 0;
		text-align: center;
		border-radius: 50%;
		color: #8a36ff;
		border: 1px solid #8a36ff;
	}
	.closemodale:hover {
		color: #919191;
	}
	.payment__modale:before {
		content: "";
		background: rgba(0, 0, 0, 0.6);
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		z-index: -1;
	}
	.opened .modal__dialog {
		-webkit-transform: translate(0, 0);
		-ms-transform: translate(0, 0);
		transform: translate(0, 0);
		position: relative;
	}
	.modal__dialog {
		background: #fefefe;
		border: #333333 solid 0px;
		border-radius: 5px;
		margin: 0 auto;
		z-index: 11;
		width: 100%;
		max-width: 520px;
		box-shadow:0 5px 10px rgba(0,0,0,0.3);
		-webkit-transition: -webkit-transform 0.3s ease-out;
		-moz-transition: -moz-transform 0.3s ease-out;
		-o-transition: -o-transform 0.3s ease-out;
		transition: transform 0.3s ease-out;
	}
	.modal__body {
		padding: 30px 30px 20px;
	}
	.modal__body input{
		width:200px;
		padding:8px;
		border:1px solid #ddd;
		color:#888;
		outline:0;
		font-size:14px;
		font-weight:bold
	}
	.modal__header{
		padding: 20px 30px;
		position: relative;
	}
	.modal__footer {
		padding: 15px 30px;
		border-top: #eeeeee solid 1px;
	}
	.modal__header {
		border-bottom: #eeeeee solid 1px;
	}
	.modal__header h4{
		margin: 0 0 10px;
		text-align: center;
		font-size: 33px;
		letter-spacing: 0;
		line-height: 1.2;
		color: #140251;
		font-weight: 700;
		text-transform: none;
		font-family: "Rajdhani", Sans-serif;
	}
	.process_payment_btn{
		padding: 18px 30px;
		display: block;
		width: 100%;
	}
	.card_png img{
		width: 100%;
		display: block;
	}
	.payment__form_field{
		margin-bottom: 15px;
	}
	.payment__form_field label{
		display: block;
		font-weight: 600;
		color: #140251;
		margin-bottom: 5px;
		font-size: 17px;
		font-family: "Rajdhani", Sans-serif;
	}
	.payment__form_field input{
		width: 100%;
		height: 46px;
		box-sizing: border-box;
		font-family: "Rajdhani", Sans-serif;
		border-radius: 5px;
		font-weight: 500;
		letter-spacing: 0.5px;
		font-size: 17px;
		padding: 8px 20px;
		color: #000;
		margin: 0;
	}	
	.payment__form_wrap{
		display: flex;
		flex-wrap: wrap;
		margin: 0 -10px;
	}
	.payment__form_wrap .payment__form_field {
		padding: 0 10px;
		flex: 0 0 100%;
		max-width: calc(100% / 2);
		box-sizing: border-box;
	}
	.payment__form_field.payment__form_field_date{
		padding: 0 10px;
		flex: 0 0 100%;
		max-width: calc(100% / 3);
		box-sizing: border-box;
	}
	.payment__form_field.payment__form_field_cvc{
		padding: 0 10px;
		flex: 0 0 100%;
		max-width: calc(100% / 3);
		box-sizing: border-box;
	}
		
		@media only screen and (max-width: 1024px){
			.price__row{
				justify-content: center;
			}
			.price__column{
				max-width: 420px;
				margin-bottom: 30px;
			}
			.price__column:nth-child(2) .price__block{
				margin-top: 0;
			}
		}
		@media only screen and (max-width: 767px){
			.price__block{
				padding: 30px 20px 40px;
			}
			.price__block__body li{
				font-size: 16px;
			}
			.price__block h3{
				font-size: 30px;
			}
			.price__block h5{
				font-size: 20px;
			}
			.pricing__sys__block label{
				font-size: 19px;
			}
			.pricing__sys__block label span{
				font-size: 14px;
			}
			.pricing__sys__block p{
				font-size: 14px;
			}
			.price__block__body li .price__icon{
				max-width: 20px;
			}
		}

</style>
	<form action="" id="pay-form">
		<input type="hidden" name="token" id="pay-token"/>
		<input type="hidden" name="amount" id="pay-amount"/>
	</form>
	<section class="">
        <div class="container" style="">
            <div class="price__row">
                <div class="price__column">
                    <div class="price__block">
                        <h3>AIS Auto</h3>
                        <h5>For Business Users</h5>
                        <div class="price__block__body">
                            <ul>
                                <li>
                                    <span class="price__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" width="34" height="34"><style>tspan { white-space:pre }.shp0 { fill: #bfbfbf }.shp1 { fill: #080808 }	</style><g id="Folder 1"><path id="Ellipse 1" class="shp0" d="M16.98 -0.01C26.37 -0.01 33.98 7.6 33.98 16.99C33.98 26.38 26.37 33.99 16.98 33.99C7.59 33.99 -0.02 26.38 -0.02 16.99C-0.02 7.6 7.59 -0.01 16.98 -0.01Z"></path><path id="Shape 1" class="shp1" d="M-0.01 19L15.42 19L9.59 25L13.71 25L21.01 17.5L13.71 10L9.59 10L15.42 16L-0.01 16L-0.01 19Z"></path></g></svg>
                                    </span>
                                    <span class="price__body_text">AutoML using a simple interface</span></li>
                                <li>
                                    <span class="price__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" width="34" height="34"><style>tspan { white-space:pre }.shp0 { fill: #bfbfbf }.shp1 { fill: #080808 }	</style><g id="Folder 1"><path id="Ellipse 1" class="shp0" d="M16.98 -0.01C26.37 -0.01 33.98 7.6 33.98 16.99C33.98 26.38 26.37 33.99 16.98 33.99C7.59 33.99 -0.02 26.38 -0.02 16.99C-0.02 7.6 7.59 -0.01 16.98 -0.01Z"></path><path id="Shape 1" class="shp1" d="M-0.01 19L15.42 19L9.59 25L13.71 25L21.01 17.5L13.71 10L9.59 10L15.42 16L-0.01 16L-0.01 19Z"></path></g></svg>
                                    </span>
                                    <span class="price__body_text">Build Predictive Models in just 3 clicks</span>
                                </li>
                                <li>
                                    <span class="price__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" width="34" height="34"><style>tspan { white-space:pre }.shp0 { fill: #bfbfbf }.shp1 { fill: #080808 }	</style><g id="Folder 1"><path id="Ellipse 1" class="shp0" d="M16.98 -0.01C26.37 -0.01 33.98 7.6 33.98 16.99C33.98 26.38 26.37 33.99 16.98 33.99C7.59 33.99 -0.02 26.38 -0.02 16.99C-0.02 7.6 7.59 -0.01 16.98 -0.01Z"></path><path id="Shape 1" class="shp1" d="M-0.01 19L15.42 19L9.59 25L13.71 25L21.01 17.5L13.71 10L9.59 10L15.42 16L-0.01 16L-0.01 19Z"></path></g></svg>
                                    </span>
                                    <span class="price__body_text">Download reports and integrate with any application</span>
                                </li>
                                <li>
                                    <span class="price__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" width="34" height="34"><style>tspan { white-space:pre }.shp0 { fill: #bfbfbf }.shp1 { fill: #080808 }	</style><g id="Folder 1"><path id="Ellipse 1" class="shp0" d="M16.98 -0.01C26.37 -0.01 33.98 7.6 33.98 16.99C33.98 26.38 26.37 33.99 16.98 33.99C7.59 33.99 -0.02 26.38 -0.02 16.99C-0.02 7.6 7.59 -0.01 16.98 -0.01Z"></path><path id="Shape 1" class="shp1" d="M-0.01 19L15.42 19L9.59 25L13.71 25L21.01 17.5L13.71 10L9.59 10L15.42 16L-0.01 16L-0.01 19Z"></path></g></svg>
                                    </span>
                                    <span class="price__body_text">Gives descriptive and prescriptive insights for specific use cases</span>
                                </li>
                            </ul>
                        </div>
                        <div class="price_btn_wrap">
                            <a href="#" class="price_contact_btn price_btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 12" width="17" height="12"><path d="M0 7.2L12.48 7.2L7.76 12L11.1 12L17 6L11.1 0L7.76 0L12.48 4.8L0 4.8L0 7.2Z"></path></svg> Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="price__column">
                    <div class="price__block">
                        <h3>AIS Interactive</h3>
                        <h5>For Data Analysts</h5>
                        <div class="price__block__body">
                            <ul>
                                <li>
                                    <span class="price__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" width="34" height="34"><style>tspan { white-space:pre }.shp0 { fill: #bfbfbf }.shp1 { fill: #080808 }	</style><g id="Folder 1"><path id="Ellipse 1" class="shp0" d="M16.98 -0.01C26.37 -0.01 33.98 7.6 33.98 16.99C33.98 26.38 26.37 33.99 16.98 33.99C7.59 33.99 -0.02 26.38 -0.02 16.99C-0.02 7.6 7.59 -0.01 16.98 -0.01Z"></path><path id="Shape 1" class="shp1" d="M-0.01 19L15.42 19L9.59 25L13.71 25L21.01 17.5L13.71 10L9.59 10L15.42 16L-0.01 16L-0.01 19Z"></path></g></svg>
                                    </span>
                                    <span class="price__body_text">No-code Interactive ML with “Easy-to-use” operators for building AI models</span>
                                </li>
                                <li>
                                    <span class="price__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" width="34" height="34"><style>tspan { white-space:pre }.shp0 { fill: #bfbfbf }.shp1 { fill: #080808 }	</style><g id="Folder 1"><path id="Ellipse 1" class="shp0" d="M16.98 -0.01C26.37 -0.01 33.98 7.6 33.98 16.99C33.98 26.38 26.37 33.99 16.98 33.99C7.59 33.99 -0.02 26.38 -0.02 16.99C-0.02 7.6 7.59 -0.01 16.98 -0.01Z"></path><path id="Shape 1" class="shp1" d="M-0.01 19L15.42 19L9.59 25L13.71 25L21.01 17.5L13.71 10L9.59 10L15.42 16L-0.01 16L-0.01 19Z"></path></g></svg>
                                    </span>
                                    <span class="price__body_text">A plethora of iterative operators for custom build models</span>
                                </li>
                                <li>
                                    <span class="price__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" width="34" height="34"><style>tspan { white-space:pre }.shp0 { fill: #bfbfbf }.shp1 { fill: #080808 }	</style><g id="Folder 1"><path id="Ellipse 1" class="shp0" d="M16.98 -0.01C26.37 -0.01 33.98 7.6 33.98 16.99C33.98 26.38 26.37 33.99 16.98 33.99C7.59 33.99 -0.02 26.38 -0.02 16.99C-0.02 7.6 7.59 -0.01 16.98 -0.01Z"></path><path id="Shape 1" class="shp1" d="M-0.01 19L15.42 19L9.59 25L13.71 25L21.01 17.5L13.71 10L9.59 10L15.42 16L-0.01 16L-0.01 19Z"></path></g></svg>
                                    </span>
                                    <span class="price__body_text">Build robust models using augmented ML</span>
                                </li>
                                <li>
                                    <span class="price__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" width="34" height="34"><style>tspan { white-space:pre }.shp0 { fill: #bfbfbf }.shp1 { fill: #080808 }	</style><g id="Folder 1"><path id="Ellipse 1" class="shp0" d="M16.98 -0.01C26.37 -0.01 33.98 7.6 33.98 16.99C33.98 26.38 26.37 33.99 16.98 33.99C7.59 33.99 -0.02 26.38 -0.02 16.99C-0.02 7.6 7.59 -0.01 16.98 -0.01Z"></path><path id="Shape 1" class="shp1" d="M-0.01 19L15.42 19L9.59 25L13.71 25L21.01 17.5L13.71 10L9.59 10L15.42 16L-0.01 16L-0.01 19Z"></path></g></svg>
                                    </span>
                                    <span class="price__body_text">Distributed computing designed for speed</span>
                                </li>
                            </ul>
                        </div>
                        <div class="pricing__system">
                            <div class="pricing__sys__block">
                                <input type="radio" id="price99" name="payment-type" value="99" checked="">
                                <label for="price99">$99<span>/week</span></label>
                                <p>Per User</p>
                            </div>
                            <div class="pricing__sys__block">
                                <input type="radio" id="price499" value="499" name="payment-type">
                                <label for="price499">$499<span>/month</span></label>
                                <p>Per User</p>
                            </div>
                            <div class="pricing__sys__block">
                                <input type="radio" id="price4999" value="4999" name="payment-type">
                                <label for="price4999">$4999<span>/year</span></label>
                                <p>Per User</p>
                            </div>
                        </div>

                        <div class="number_of_user">
                            <h6>Number of users:</h6>
                            <input type="number" id="no_of_users" placeholder="00" value="1" min="1" max="" name="">
                        </div>

                        <div class="price_btn_wrap">
                            <a href="#" class="price_contact_btn price_btn openmodale"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 12" width="17" height="12"><path d="M0 7.2L12.48 7.2L7.76 12L11.1 12L17 6L11.1 0L7.76 0L12.48 4.8L0 4.8L0 7.2Z"></path></svg> Start Free Trial</a>
                        </div>
                    </div>
                </div>
                <div class="price__column">
                    <div class="price__block">
                        <h3>AIS Auto</h3>
                        <h5>For Business Users</h5>
                        <div class="price__block__body">
                            <ul>
                                <li>
                                    <span class="price__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" width="34" height="34"><style>tspan { white-space:pre }.shp0 { fill: #bfbfbf }.shp1 { fill: #080808 }	</style><g id="Folder 1"><path id="Ellipse 1" class="shp0" d="M16.98 -0.01C26.37 -0.01 33.98 7.6 33.98 16.99C33.98 26.38 26.37 33.99 16.98 33.99C7.59 33.99 -0.02 26.38 -0.02 16.99C-0.02 7.6 7.59 -0.01 16.98 -0.01Z"></path><path id="Shape 1" class="shp1" d="M-0.01 19L15.42 19L9.59 25L13.71 25L21.01 17.5L13.71 10L9.59 10L15.42 16L-0.01 16L-0.01 19Z"></path></g></svg>
                                    </span>
                                    <span class="price__body_text">Enterprise-grade security, repeatability, and scale</span>
                                </li>
                                <li>
                                    <span class="price__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" width="34" height="34"><style>tspan { white-space:pre }.shp0 { fill: #bfbfbf }.shp1 { fill: #080808 }	</style><g id="Folder 1"><path id="Ellipse 1" class="shp0" d="M16.98 -0.01C26.37 -0.01 33.98 7.6 33.98 16.99C33.98 26.38 26.37 33.99 16.98 33.99C7.59 33.99 -0.02 26.38 -0.02 16.99C-0.02 7.6 7.59 -0.01 16.98 -0.01Z"></path><path id="Shape 1" class="shp1" d="M-0.01 19L15.42 19L9.59 25L13.71 25L21.01 17.5L13.71 10L9.59 10L15.42 16L-0.01 16L-0.01 19Z"></path></g></svg>
                                    </span>
                                    <span class="price__body_text">Supports on-premise, cloud and hybrid deployment</span>
                                </li>
                                <li>
                                    <span class="price__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" width="34" height="34"><style>tspan { white-space:pre }.shp0 { fill: #bfbfbf }.shp1 { fill: #080808 }	</style><g id="Folder 1"><path id="Ellipse 1" class="shp0" d="M16.98 -0.01C26.37 -0.01 33.98 7.6 33.98 16.99C33.98 26.38 26.37 33.99 16.98 33.99C7.59 33.99 -0.02 26.38 -0.02 16.99C-0.02 7.6 7.59 -0.01 16.98 -0.01Z"></path><path id="Shape 1" class="shp1" d="M-0.01 19L15.42 19L9.59 25L13.71 25L21.01 17.5L13.71 10L9.59 10L15.42 16L-0.01 16L-0.01 19Z"></path></g></svg>
                                    </span>
                                    <span class="price__body_text">Suitable for both teams and enterprises</span>
                                </li>
                                <li>
                                    <span class="price__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" width="34" height="34"><style>tspan { white-space:pre }.shp0 { fill: #bfbfbf }.shp1 { fill: #080808 }	</style><g id="Folder 1"><path id="Ellipse 1" class="shp0" d="M16.98 -0.01C26.37 -0.01 33.98 7.6 33.98 16.99C33.98 26.38 26.37 33.99 16.98 33.99C7.59 33.99 -0.02 26.38 -0.02 16.99C-0.02 7.6 7.59 -0.01 16.98 -0.01Z"></path><path id="Shape 1" class="shp1" d="M-0.01 19L15.42 19L9.59 25L13.71 25L21.01 17.5L13.71 10L9.59 10L15.42 16L-0.01 16L-0.01 19Z"></path></g></svg>
                                    </span>
                                    <span class="price__body_text">Customized support and Autoscaling</span>
                                </li>
                            </ul>
                        </div>
                        <div class="price_btn_wrap">
                            <a href="#" class="price_contact_btn price_btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 12" width="17" height="12"><path d="M0 7.2L12.48 7.2L7.76 12L11.1 12L17 6L11.1 0L7.76 0L12.48 4.8L0 4.8L0 7.2Z"></path></svg> Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="payment__modale" aria-hidden="true">
        <div class="modal__dialog">
            <div class="modal__header">
                <h4>Payment Details</h4>
                <a href="#" class="closemodale" aria-hidden="true">&times;</a>
            </div>

            <div class="modal__body">
                <div class="payment__form_field">
                    <label>Name</label>
                    <input type="text"placeholder="Name" id="name"  name="">
                </div>
                <div class="payment__form_field">
                    <label>Address Line 1</label>
                    <input type="text" placeholder="Enter Address Line 1" id="address1" name="">
                </div>
                <div class="payment__form_field">
                    <label>Address Line 2</label>
                    <input type="text" placeholder="Enter Address Line 2" id="address2" name="">
                </div>
                <div class="payment__form_wrap">
                    <div class="payment__form_field">
                        <label>Country</label>
                        <input type="text" placeholder="Enter Country" id="country" name="">
                    </div>
                    <div class="payment__form_field">
                        <label>State</label>
                        <input type="text" placeholder="Enter State" id="state" name="">
                    </div>
                </div>
                <div class="payment__form_wrap">
                    <div class="payment__form_field">
                        <label>City</label>
                        <input type="text" placeholder="Enter City" id="city" name="">
                    </div>
                    <div class="payment__form_field">
                        <label>Zip Code</label>
                        <input type="text" placeholder="Enter Zip Code" id="zip" name="">
                    </div>					
                </div>
                <div class="payment__form_field">
                    <label>Card Number</label>
                    <input type="text"  placeholder="Card Number" id="card_number" name="" maxlength="16" onkeypress="return IsNumeric(event);">
                </div>
                <div class="payment__form_wrap">
                    <div class="payment__form_field payment__form_field_date">
                        <label>MM</label>
                        <input type="text" id="card_expiry_month" placeholder="MM" name="" maxlength="2" onkeypress="return IsNumeric(event);">
                    </div>
                    <div class="payment__form_field payment__form_field_date">
                        <label>YYYY</label>
                        <input type="text" id="card_expiry_year"  placeholder="YYYY" name="" maxlength="4" onkeypress="return IsNumeric(event);">
                    </div>
                    <div class="payment__form_field payment__form_field_cvc">
                        <label>CV CODE</label>
                        <input type="text" id="cvc" placeholder="cvc" name="" maxlength="3" onkeypress="return IsNumeric(event);">
                    </div>
                </div>
                
            </div>

            <div class="modal__footer">
                <button id="btnPayment" class="process_payment_btn price_btn">Process payment <span id="span-total-amount"></span></button>
            </div>
        </div>
    </div>
    <!-- /Modal -->


    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script> 
    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
    <script type="text/javascript">
        var amount = 99;
        var no_of_users = 1;
        var total_amount = 99;
        jQuery('.openmodale').click(function (e) {
            no_of_users = jQuery('#no_of_users').val();
            total_amount = parseInt(amount)*parseInt(no_of_users);
            jQuery('#span-total-amount').text('$'+total_amount);
            //alert(total_amount);
                e.preventDefault();
                jQuery('.payment__modale').show();
        });
        jQuery('.closemodale').click(function (e) {
                e.preventDefault();
                jQuery('.payment__modale').hide();
        });
    </script>
    <script type="text/javascript">
        
        jQuery("#btnPayment").on("click",function(){
            paymentHandler();
        })

        jQuery('input[type=radio][name=payment-type]').change(function() {
            amount = this.value;
            //alert(this.value);
        });

        function paymentHandler(){
            if(jQuery('#name').val()==''){
                swal("Oops!", "Please enter your name", "error");  
            }else if(jQuery('#address1').val()==''){
                swal("Oops!", "Please enter your address line 1", "error"); 
            }else if(jQuery('#address2').val()==''){
                swal("Oops!", "Please enter your address line 2", "error"); 
            }else if(jQuery('#country').val()==''){
                swal("Oops!", "Please enter your country", "error"); 
            }else if(jQuery('#state').val()==''){
                swal("Oops!", "Please enter your state", "error"); 
            }else if(jQuery('#city').val()==''){
                swal("Oops!", "Please enter your city", "error"); 
            }else if(jQuery('#zip').val()==''){
                swal("Oops!", "Please enter your zip code", "error"); 
            }else if(jQuery('#card_number').val()==''){
                swal("Oops!", "Please enter card no", "error"); 
            }else if(jQuery('#card_expiry_month').val()==''){
                swal("Oops!", "Please enter expiry month", "error"); 
            }else if(jQuery('#card_expiry_year').val()==''){
                swal("Oops!", "Please enter expiry year", "error"); 
            }else if(jQuery('#cvc').val()==''){
                swal("Oops!", "Please enter CVC", "error"); 
            }else{
                Stripe.setPublishableKey('pk_test_51JXjzUSBEz1Fi9XLWnp8DLozVeahdlTym4N1kBWOBFkrvyXFbe8orRpzm5NaNvyDBUyzsakCf1IGAYeJ4icTBq6G00BqS5Fvg5');
                Stripe.createToken({
                    name: jQuery('#name').val(),
                    address_line1: 'TEst address',
                    address_line2: 'TEst LIne 2',
                    address_city: 'New York',
                    address_state: 'New York',
                    address_zip: '10001',
                    address_country: 'US',
                    number: jQuery('#card_number').val(),
                    cvc: jQuery('#cvc').val(),
                    exp_month: jQuery('#card_expiry_month').val(),
                    exp_year: jQuery('#card_expiry_year').val()
                }, stripeResponseHandler);
            }
        }

        function stripeResponseHandler(status, response) {
            if (response.error) {
                console.log(response.error.message);
            } else {
                // token contains id, last4, and card type
                console.log("resp>>"+JSON.stringify(response));
                var token = response['id'];

                jQuery('#pay-token').val(token);
                jQuery('#pay-amount').val(total_amount);
                jQuery('#pay-form').submit();
                //alert(token);
            }
        }

        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            //document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;
        }
    </script>