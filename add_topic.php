<?php

include('config.php');
$tbl_name="forum_question"; // Table name 

// Connect to server and select database.
// get data that sent from form 
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$name=$_POST['name'];
$email=$_POST['email'];

$datetime=date("d/m/y h:i:s"); //create date time

$sql="INSERT INTO $tbl_name(topic, detail, name, email, datetime)VALUES('$topic', '$detail', '$name', '$email', '$datetime')";
$db = config::connect();
$result=$db->query($sql);

if($result){
echo "Successful<BR>";
header('Location: forum.php');
echo "<a href=forum.php>View your topic</a>";
}
else {
echo "ERROR";
}
?>