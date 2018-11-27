<?php



require "vendor/autoload.php";

$access_token = '/QDU5VFzEuY50BssaLzvWY4hAwrnFFYIiEB9ZUSkSwPsLodLMHFlG/cd/coaqo+JITGCBghQb8HCOHYBoiGdT78YRf8aUjBDT4XVR6/VJfmgtIYJLcaJYb63b9hfYTk/NKNvNs7Pr5L2k0E0AmI+7gdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'f85ce9838a317d2251ff17ad03780b60';

$pushID = 'U7ef7a449f2a5c2057eacfc02ba2eb286';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







