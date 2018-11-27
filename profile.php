<?php


$access_token = '/QDU5VFzEuY50BssaLzvWY4hAwrnFFYIiEB9ZUSkSwPsLodLMHFlG/cd/coaqo+JITGCBghQb8HCOHYBoiGdT78YRf8aUjBDT4XVR6/VJfmgtIYJLcaJYb63b9hfYTk/NKNvNs7Pr5L2k0E0AmI+7gdB04t89/1O/w1cDnyilFU=';

$userId = 'U76d159d4b69f8bfbe4c8e51ed112b31a';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

