<?php

	function successResponse($msg='',$data=[],$status=200)
	{
		return response()->json(['error'=>false,'status'=>$status,'message'=>$msg,'data'=>$data]);
	}

	function errorResponse($msg='',$data=[],$status=200)
	{
		return response()->json(['error'=>true,'status'=>$status,'message'=>$msg,'data'=>$data]);
	}

	function emptyCheck($string,$date=false)
	{
		if($date){
			return !empty($string) ? $string : '0000-00-00';
		}
		return !empty($string) ? $string : '';
	}

	function randomGenerator()
	{
		return uniqid().''.date('ymdhis').''.uniqid();
	}

	function moneyFormat($amount)
	{
		$amount = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amount);
		return $amount;
	}

	function words($value, $words = 100, $end = '...')
    {
        return Str::words($value, $words, $end);
    }

	function generateUniqueAlphaNumeric($length = 7)
    {
    	$random_string = '';
    	for($i = 0; $i < $length; $i++) {
    		$number = random_int(0, 36);
    		$character = base_convert($number, 10, 36);
    		$random_string .= $character;
    	}
    	return $random_string;
    }

    function getSumOfPoints($userPoints){
    	$totalPoint = 0;
    	foreach($userPoints as $getPoint){
    		$totalPoint += $getPoint->points;
    	}
    	return $totalPoint;
    }

	function getCommission()
	{
		if(session()->has('commission')){
			return session()->get('commission');
		}else{
			$master = \App\Models\Master::first();
			session('commission',$master->commission);
			return $master->commission;
		}
	}

	// Function to change any datetime to Indian Standard Time
	function changeToIst($datetime)
	{
		$localDateTime = new DateTime($datetime);
		$localDateTime->setTimezone(new DateTimeZone('Asia/Calcutta'));
		$changedDateTime = (object)[];
		$changedDateTime->date = $localDateTime->format("Y-m-d");
		$changedDateTime->time = $localDateTime->format("H:i:s");
		return $changedDateTime;
		// dd($changedDateTime);
	}

	// Function to change any datetime to Users Local Time
	function changeToLocalTime($datetime, $timezone)
	{
		$istDateTime = new DateTime($datetime);
		$istDateTime->setTimezone(new DateTimeZone($timezone));
		$changedDateTime = (object)[];
		$changedDateTime->date = $istDateTime->format("Y-m-d");
		$changedDateTime->time = $istDateTime->format("H:i:s");
		return $changedDateTime;
		// dd($changedDateTime);
	}
 ?>
