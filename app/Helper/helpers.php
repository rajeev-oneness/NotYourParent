<?php

function successResponse($msg = '', $data = [], $status = 200)
{
	return response()->json(['error' => false, 'status' => $status, 'message' => $msg, 'data' => $data]);
}

function errorResponse($msg = '', $data = [], $status = 200)
{
	return response()->json(['error' => true, 'status' => $status, 'message' => $msg, 'data' => $data]);
}

function getDays($month, $year)
{
	$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
	return $days;
}

function emptyCheck($string, $date = false)
{
	if ($date) {
		return !empty($string) ? $string : '0000-00-00';
	}
	return !empty($string) ? $string : '';
}

function randomGenerator()
{
	return uniqid() . '' . date('ymdhis') . '' . uniqid();
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

function explodeCust($value, $position = 0)
{
	$str = explode(' ', $value);
	return $str[$position];
}

function custom_review(float $value)
{
	if ($value <= 5.00 && $value >= 4.00) {
		return 'success';
	} elseif ($value <= 3.99 && $value >= 3.00) {
		return 'primary';
	} elseif ($value <= 2.99 && $value >= 2.00) {
		return 'warning';
	} else {
		return 'danger';
	}
}

function generateUniqueAlphaNumeric($length = 7)
{
	$random_string = '';
	for ($i = 0; $i < $length; $i++) {
		$number = random_int(0, 36);
		$character = base_convert($number, 10, 36);
		$random_string .= $character;
	}
	return $random_string;
}

function getSumOfPoints($userPoints)
{
	$totalPoint = 0;
	foreach ($userPoints as $getPoint) {
		$totalPoint += $getPoint->points;
	}
	return $totalPoint;
}

//calculate the total price with commission
function calculatePrice($price)
{
	$commission = getCommission();
	$totalPrice = $price + ($price * ($commission / 100));
	return $totalPrice;
}

function getCommission()
{
	if (session()->has('commission')) {
		return session()->get('commission');
	} else {
		$master = \App\Models\Master::first();
		session('commission', $master->commission);
		return $master->commission;
	}
}

// Function to change any datetime to Indian Standard Time
function changeToIst($datetime, $timezone)
{
	$localDateTime = new DateTime($datetime);
	if ($timezone != 'Asia/Calcutta') {
		$localDateTime->setTimezone(new DateTimeZone($timezone));
	}
	$changedDateTime = $localDateTime->format("Y-m-d H:i:s");
	return $changedDateTime;
}

// Function to change any datetime to Users Local Time
function changeToLocalTime($datetime, $timezone)
{
	$istDateTime = new DateTime($datetime);
	$istDateTime->setTimezone(new DateTimeZone($timezone));
	$changedDateTime = $istDateTime->format("Y-m-d H:i:s");
	return $changedDateTime;
	// dd($changedDateTime);
}

//slot generating (4, 2, '23:00:00', '02:00:00', 'Asia/Calcutta');
function generateSlot($teacherId, $days, $fromTime, $toTime, $timezone)
{
	$slots = (object)[];
	for ($i = 0; $i < $days; $i++) {
		$currentDate = date('Y-m-d', strtotime('+' . $i . 'days'));
		if ($fromTime > $toTime) {
			$from = date('Y-m-d H:i:s', strtotime($currentDate . ' ' . $fromTime));
			$to = date('Y-m-d H:i:s', strtotime($currentDate . ' ' . $toTime . ' +1 day'));
		} else {
			$from = date('Y-m-d H:i:s', strtotime($currentDate . ' ' . $fromTime));
			$to = date('Y-m-d H:i:s', strtotime($currentDate . ' ' . $toTime));
		}
		$j = 0;
		$from = changeToIst($from, $timezone);
		$to = changeToIst($to, $timezone);
		while ($from < $to) {
			if ($j == 0) {
				$from = date('Y-m-d H:i:s', strtotime($from . ' +0 minutes'));
			} else {
				$from = date('Y-m-d H:i:s', strtotime($from . ' +20 minutes'));
			}
			$slotDateTime = explode(' ', $from);
			$slotFind = App\Models\Slot::where('teacherId', $teacherId)->where('date', $slotDateTime[0])->where('time', $slotDateTime[1])->first();

			if (empty($slotFind)) {
				$slot = new App\Models\Slot;
				$slot->teacherId = $teacherId;
				$slot->date = $slotDateTime[0];
				$slot->time = $slotDateTime[1];
				$slot->save();
				$slots->error = false;
				$slots->message = 'Slot created successfully';
				$slots->slot[$i][$j] = $slot;
			} else {
				$slots->error = true;
				$slots->message = 'Can not store duplicate slot';
				$slots->slot = '';
			}
			// echo '<pre>';
			// print_r($slotDateTime);
			// print_r($slots);
			$j++;
		}
	}
	return $slots;
	// dd($slots);
	// exit;
}

function createNotification($sender, $receiver, $type, $title, $message, $route = null)
{
	$notification = new App\Models\Notification;
	$notification->sender_id = $sender;
	$notification->receiver_id = $receiver;
	$notification->type = $type;
	$notification->title = $title;
	$notification->message = $message;
	$notification->route = $route;
	$notification->save();
}

function currencySymbol($name)
{
	$name = strtolower($name);
	if ($name == 'usd') {
		$response = '$';
	}

	return $response;
}

// string check
function strCheck($string = "")
{
	$returnString = '';
	for ($i = 0; $i < strlen($string); $i++) {
		if ($string[$i] == '"') {
			$returnString .= '&#34;';
		} else if ($string[$i] == "'") {
			$returnString .= '&#3;';
		} else {
			$returnString .= $string[$i];
		}
	}
	return $returnString;
}

function getUserDeviceTokens($fullRequest)
{
	$user = (object)[];
	if (!empty($fullRequest->header('Authorization'))) {
		$token = (explode(' ', $fullRequest->header('Authorization'))[1] ?? '');
		dd($token);
		$token_parts = explode('.', $token);
		$token_header = ($token_parts[1] ?? '');
		$token_header_json = base64_decode($token_header);
		$token_header_array = json_decode($token_header_json, true);
		$token_id = $token_header_array['jti'];
		$userToken = \App\Models\OAuthAccessToken::where('id', $token_id)->first();
		if ($userToken) {
			$deviceTokens = \App\Models\OAuthAccessToken::select('device_token')->where('user_id', $userToken->user_id)->where('revoked', false)->pluck('device_token');
			return $deviceTokens;
		}
	}
	return $user;
}
function sendPushNotification($devideType = 'web', $deviceToken = [], $payload = [])
{
	if ($deviceToken != '') {
		$API_ACCESS_KEY = 'AAAABTBaXyw:APA91bEO9aSMDXRqOfHX62UqcucWAq31dkjhidUygr5_i7eGKKYOQTn-mQ4pYJz4gVcgmL-hEWnmGE0ppc_cy44Vlu_ecXqi1mylEwnx4rplLLPs5zZ6OQcPjX12_n1ES7kG9pfL9dD9';
		$firebaseToken = $deviceToken;
		$data = [
			"registration_ids" => $firebaseToken,
			"notification" => [
				'data' => $payload,
			],
		];
		$headers = [
			'Authorization: key=' . $API_ACCESS_KEY,
			'Content-Type: application/json',
		];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		$response = curl_exec($ch);
	}
}
