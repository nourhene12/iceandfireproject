<?php
// INIT
require "config.php";
require "lib-rating.php";
session_start();
$rate = new Rating();

// DUMMY USER SESSION
// REMOVE THIS IN YOUR OWN SYSTEM...
$_SESSION['user'] = [
  "id" => 1,
  "name" => "John Doe"
];

// HANDLE AJAX REQUESTS
switch ($_POST['req']) {
  /* [INVALID REQUEST] */
  default:
    echo "Invalid request";
    break;

  /* [SAVE RATING] */
  case "save":
    echo $rate->save($_POST['temoignage_id'], $_SESSION['user']['id'], $_POST['rating']) ? "OK" : "ERR";
    break;
}
?>