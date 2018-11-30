<?php // callback.php
require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
$access_token = '/QDU5VFzEuY50BssaLzvWY4hAwrnFFYIiEB9ZUSkSwPsLodLMHFlG/cd/coaqo+JITGCBghQb8HCOHYBoiGdT78YRf8aUjBDT4XVR6/VJfmgtIYJLcaJYb63b9hfYTk/NKNvNs7Pr5L2k0E0AmI+7gdB04t89/1O/w1cDnyilFU=';
 
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$access_token}";
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = $arrayJson['events'][0]['source']['userId'];
   #ตัวอย่าง Message Type "Text + Sticker"
   if($message == "สวัสดี"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "34";
      
      pushMsg($arrayHeader,$arrayPostData);
   }else if($message == "test"){
      $arrayPostData['to'] = $id;
         $arrayPostData['messages'][0]['type'] = "flex";
         $arrayPostData['messages'][0]['altText'] = ";akd;aks;a";
         $arrayPostData['messages'][0]['contents']['type'] = "bubble";
         $arrayPostData['messages'][0]['contents']['body']['type'] = "box";
         $arrayPostData['messages'][0]['contents']['body']['layout'] = "vertical";
         $arrayPostData['messages'][0]['contents']['body']['contents'][0]['type'] = "button";
         $arrayPostData['messages'][0]['contents']['body']['contents'][0]['style'] = "primary";
         $arrayPostData['messages'][0]['contents']['body']['contents'][0]['height'] = "sm";
         $arrayPostData['messages'][0]['contents']['body']['contents'][0]['action']['type'] = "uri";
         $arrayPostData['messages'][0]['contents']['body']['contents'][0]['action']['label'] = "click";
         $arrayPostData['messages'][0]['contents']['body']['contents'][0]['action']['uri'] = "https://www.sellterest.com/";
      pushMsg($arrayHeader,$arrayPostData);
   }
   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
   exit;
