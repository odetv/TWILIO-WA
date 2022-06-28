<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once 'vendor/autoload.php'; 
 
use Twilio\Rest\Client; 
 
$sid    = "ACb4278b4744513fee3eeeca4002f79a3d"; 
$token  = "b4577026acbcf0e3ae302d9a072b7ecb"; 
$twilio = new Client($sid, $token); 

$sender = $_POST['Form'];
$msg    = $_POST['Body'];

$to         = "whatsapp:+6285157937676";
$from       = "whatsapp:+14155238886";
$body       = "Uji coba, pesan gambar \n" . 
              "--------------------------\n" . 
              "Pengirim : $sender \n" . 
              "Pesan    : $msg \n" . 
              "--------------------------\n";
$mediaUrl   = "http://www.jrryptr.com/twilio/files/office.jpg";

$message = $twilio->messages 
                  ->create($to, // to 
                           array( 
                               "from" => $from,
                               "body" => $body,
                               "mediaUrl" => [$mediaUrl]
                           ) 
                  ); 
 
print($message->sid);