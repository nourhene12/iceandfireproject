<?php
  // Authorisation details.
  $username = "majdmustapha@gmail.com";
  $hash = "16d6d0a8e97122326b573a98b1fb94dafcf555c73a085d13dce8a22f67cbb3cb";

  // Config variables. Consult http://api.txtlocal.com/docs for more info.
  $test = "0";

  // Data for text message. This is the text message data.
  $sender = "IceAndFire"; // This is who the message appears to be from.
  $numbers = "+21623285801"; // A single number or a comma-seperated list of numbers
  $message = "Votre réclamation est en cours de traitement....Merci";
  // 612 chars or less
  // A single number or a comma-seperated list of numbers
  $message = urlencode($message);
  $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
  $ch = curl_init('http://api.txtlocal.com/send/?');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch); // This is the result from the API
  curl_close($ch);
  echo "SMS envoyé .. ";
?>