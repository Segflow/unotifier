<?php

namespace App\Services;

use Log;

class PushSender {

	static public function send($notif, $device) {
		if ($device->type == 'ios')
			return PushSender::sendIOS($notif, $device->token);
		else if ($device->type == 'android')
			return PushSender::sendAndroid($notif, $device->token);
	}

	static private function sendIOS($notif, $token) {
		// echo 'sending IOS to ' . $token . '<br>';
		return false;
	}


	static private function generate_random($length = 15) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
		    $randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	static private function sendAndroid($notif, $token, $link='',$badge = 1, $sound = 'default') {
		// echo 'sending Android to ' . $token . '<br>';
		$registrationIds = array($token);
		$message_id = PushSender::generate_random();
		// prep the bundle
		$msg = array
		(
			'message' => $notif->content,
			'subject' => $notif->subject,
			'sender' => (string)$notif->sender,
			'id_msg' => $message_id,
			'url_Open'	=> $link,
		);

		$fields = array
		(
			'registration_ids' 	=> $registrationIds,
			'data'			=> $msg
		);

		$API_ACCESS_KEY = 'AIzaSyAYbORipaH3Y4UXW16q8GTQrKC7H_QG7Yw';
		$headers = array
		(
			'Authorization: key=' . $API_ACCESS_KEY,
			'Content-Type: application/json'
		);

		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = json_decode(curl_exec($ch));
		curl_close( $ch );

		if ($result->failure) {
			$msg = sprintf("Send failure to device %s : %s", $token, $result->results[0]->error);
			Log::error($msg);
		}

		if ($result->success) {
			return $message_id;
		}
		return false;
	}
}

// PushSender::$android_api_key = env('ANDROID_API_KEY');
// PushSender::$apple_certif_file = env('APPLE_CERTIF_FILE');
