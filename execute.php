<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

/*
if(!$update){
  exit;
}
*/

require "functions.php";

/*===================================
            VAR SETTING
===================================*/

/* MESSAGE ARRAY SET */
$message = isset($update['message']) ? $update['message'] : "";

/* UTILITY VARS SET*/
$text = isset($message['text']) ? $message['text'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";

/* COMMAND STRING SET */
$command = isset($message['text']) ? $message['text'] : "";
$command = trim($command);
$command = strtolower($command);

/*===================================
            ADMIN COMMANDS
===================================*/
if(strtolower($username) == 'stefaniscion'){
  
  if($command == '/getjson'){
    $r_text = '`'.json_encode($update).'`';
    $r_method  = "sendMessage";
  }
  
  elseif(isset($message['photo'])){
    $r_text = '`'.json_encode($update).'`';
    $r_method  = "sendMessage";
  }
  elseif(isset($message['audio'])){
    $r_text = '`'.json_encode($update).'`';
    $r_method  = "sendMessage";
  }
  elseif(isset($message['video'])){
    $r_text = '`'.json_encode($update).'`';
    $r_method  = "sendMessage";
  }
  elseif(isset($message['animation'])){
    $r_text = '`'.json_encode($update).'`';
    $r_method  = "sendMessage";
  }  
  
  elseif($command == '/hash'){
    $r_text = md5_file ('execute.php');
    $r_method  = "sendMessage";
  }
}

/*===================================
              LISTENER
===================================*/
elseif(strpos($command,'hey sono tornato')!==false){
  $r_text = 'Ciao';
  $r_method  = "sendMessage";
}
/*===================================
              RESPONSE 
===================================*/
header("Content-Type: application/json");

$parameters = array(
                    'chat_id' =>  $chatId, 
                    'parse_mode' => 'Markdown'
                   );

if($r_text){
  $parameters["text"] = $r_text;
}
if($r_photo){
  $parameters["photo"] = $r_photo;
}
if($r_audio){
  $parameters["audio"] = $r_audio;
}
if($r_animation){
  $parameters["animation"] = $r_animation;
}
if($r_caption){
  $parameters["caption"] = $r_caption;
}

$parameters["method"] = $r_method;

echo json_encode($parameters);

