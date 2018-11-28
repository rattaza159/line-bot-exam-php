<?php // callback.php
require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
$access_token = '/QDU5VFzEuY50BssaLzvWY4hAwrnFFYIiEB9ZUSkSwPsLodLMHFlG/cd/coaqo+JITGCBghQb8HCOHYBoiGdT78YRf8aUjBDT4XVR6/VJfmgtIYJLcaJYb63b9hfYTk/NKNvNs7Pr5L2k0E0AmI+7gdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
//Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			
			$replyToken = $event['replyToken'];
			$Headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$message = $event['events'][0]['message']['text'];
			
			if($message == "วิธีการใช้งาน"){
			$text = $event['source']['userId'];
			$event['type'] == 'message';
			// Build message to reply back
			$messages = [
				'type'  => 'text',
				'text'  => $text
			];
			$Data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
				
				pushMsg($Headers,$Data);
				
			}else{
				
			$text2 = "ไม่รู้จักคำสั่งครับ";
			$event['type'] == 'message';
			// Build message to reply back
			$messages2 = [
				'type'  => 'text',
				'text'  => $text2
			];
			$Data2 = [
				'replyToken' => $replyToken,
				'messages' => [$messages2],
			];
				
				pushMsg($Headers,$Data2);
					
			}
			
		}
	}
}
echo "OK";

	function pushMsg($headers,$data){
		
		$url = 'https://api.line.me/v2/bot/message/reply';
		$post = json_encode($data);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		echo $result . "\r\n";
		
	}
