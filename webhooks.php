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
      
       {
           "to": "userId or groupId",
           "messages": [{
               "type": "flex",
               "altText": "This is a Flex Message",
               "contents": {
                   {
  "type": "bubble",
  "header": {
    "type": "box",
    "layout": "vertical",
    "contents": [
      {
        "type": "text",
        "text": "FIFA World Cup 2018",
        "size": "xl",
        "weight": "bold"
      }
    ]
  },
  "hero": {
    "type": "image",
    "url": "https://sitthi.me:3807/static/fifa.jpg",
    "size": "full",
    "aspectRatio": "20:13",
    "aspectMode": "cover"
  },
  "body": {
    "type": "box",
    "layout": "vertical",
    "spacing": "md",
    "contents": [
      {
        "type": "box",
        "layout": "horizontal",
        "spacing": "sm",
        "contents": [
          {
            "type": "text",
            "text": "LIVE !",
            "size": "lg",
            "color": "#555555",
            "weight": "bold",
            "align": "center"
          }
        ]
      },
      {
        "type": "button",
        "style": "primary",
        "action": {
          "type": "postback",
          "label": "Portugal  1 : 0  Morocco",
          "displayText": "Live Report !!",
          "data": "LIVE"
        }
      },
      {
        "type": "separator",
        "margin": "lg"
      },
      {
        "type": "box",
        "layout": "vertical",
        "margin": "lg",
        "spacing": "sm",
        "contents": [
          {
            "type": "box",
            "layout": "horizontal",
            "spacing": "sm",
            "contents": [
              {
                "type": "button",
                "style": "primary",
                "action": {
                  "type": "postback",
                  "label": "Last Match",
                  "displayText": "Last Match",
                  "data": "LAST"
                }
              },
              {
                "type": "button",
                "style": "primary",
                "action": {
                  "type": "postback",
                  "label": "Next Match",
                  "displayText": "Next Match",
                  "data": "NEXT"
                }
              }
            ]
          },
          {
            "type": "box",
            "layout": "horizontal",
            "spacing": "sm",
            "contents": [
              {
                "type": "button",
                "style": "primary",
                "action": {
                  "type": "postback",
                  "label": "Schedule",
                  "displayText": "Schedule",
                  "data": "SCHEDULE"
                }
              },
              {
                "type": "button",
                "style": "primary",
                "action": {
                  "type": "postback",
                  "label": "Table",
                  "displayText": "Table",
                  "data": "TABLE"
                }
              }
            ]
          }
        ]
      }
    ]
  },
  "footer": {
    "type": "box",
    "layout": "vertical",
    "contents": [
      {
        "type": "button",
        "margin": "sm",
        "action": {
          "type": "uri",
          "label": "View Source",
          "uri": "https://sitthi.me:3807/downloaded/ba5f784d837540dfb40df2d531d7519c.json"
        },
        "style": "secondary"
      }
    ]
  }
}
               }
           }]
       }
 
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
