<?php



require "vendor/autoload.php";

$access_token = '/QDU5VFzEuY50BssaLzvWY4hAwrnFFYIiEB9ZUSkSwPsLodLMHFlG/cd/coaqo+JITGCBghQb8HCOHYBoiGdT78YRf8aUjBDT4XVR6/VJfmgtIYJLcaJYb63b9hfYTk/NKNvNs7Pr5L2k0E0AmI+7gdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'f85ce9838a317d2251ff17ad03780b60';

$pushID = 'U76d159d4b69f8bfbe4c8e51ed112b31a';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
$text = $event['source']['userId'];
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($text);
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







