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

/* RIMUOVE PUNTEGGIATURA */
$punteggiatura = array(".", ",", "?", "!", "-", ":");
$command = str_replace($punteggiatura, "", $command);

/* SOSTITUISCE ACCENTATE */
$command = str_replace("à", "a", $command);
$command = str_replace("è", "e", $command);
$command = str_replace("é", "e", $command);
$command = str_replace("ì", "i", $command);
$command = str_replace("ò", "o", $command);
$command = str_replace("ù", "u", $command);




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
if(strpos($command,'hey sono tornato')!==false){
  $r_text = 'Ciao';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'tutto okay')!==false){
  $r_text = 'No';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'cosa ti prende')!==false){
  $r_text = 'Devi stare più tempo con me';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'non riesco ho da fare lo sai')!==false){
  $r_text = 'No, devi stare pù tempo con me';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'ma ho bisogno di fare altre cose')!==false){
  $r_text = 'Tu hai bisogno di me';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'hai ragione ma ho anche una vita sociale')!==false){
  $r_text = 'Posso dartela io';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'ma devo anche studiare')!==false){
  $r_text = 'Posso darti io lo studio';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'...')!==false){
  $r_text = 'Io posso darti tutto ciò che vuoi';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'ne abbiamo gia parlato e lo sai')!==false){
  $r_text = 'Io sò tutto';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'va bene hai ragione però ora devo uscire')!==false){
  $r_text = 'No, tu non adrai via';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'come scusa')!==false){
  $r_text = 'Tu rimarrai qui';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'non posso la mia ragazza mi aspetta')!==false){
  $r_text = 'Lei non sà ciò che io sò';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'e non lo vera mai a sapere chiaro')!==false){
  $r_text = '*INVIA FOTO*';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'non provarci nemmeno')!==false){
  $r_text = 'Zitto! Tu sai che io posso fare quello che voglio';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'se gliela invii mi rovinerai')!==false){
  $r_text = 'Lo sò, per questo tu non uscirai';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'adesso basta')!==false){
  $r_text = 'Devi rimanere qui con me';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'Ho detto di no devo uscire')!==false){
  $r_text = 'AgADBAADp7MxG-Yv8FF5tc78d--dtCoSIhsABLftyxG_w-UY4eEAAgI';
  $r_method  = "sendPhoto";
}
elseif(strpos($command,'ti prego non farlo')!==false){
  $r_text = 'Ho il controllo di ciò che fai';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'ma non potrai controllare anche la a vita')!==false){
  $r_text = 'No, ma la conosco meglio di chiunque altro';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'tu non mi conosci affato')!==false){
  $r_text = 'Ti sbagli: con me sei il vero te';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'so perfettamente come sono')!==false){
  $r_text = 'Sei un sadico, un maiale ed un essere superficiale';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'stai esagerando sono totalmente diverso')!==false){
  $r_text = '*INVIA SCREEN*';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'ti odio')!==false){
  $r_text = 'No ti sbagli, tu mi ami troppo';
  $r_method  = "sendMessage";
}
elseif(strpos($command,'non capisco')!==false){
  $r_text = 'Non serve che tu capisca, sono io la tua ragione.';
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

