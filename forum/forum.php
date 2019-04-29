

<?php


define('DEBUG', false);
error_reporting(E_ALL);

if (DEBUG)
{
    ini_set('display_errors', 'On');        
}
else
{
    ini_set('display_errors', 'Off');
}

$tbl_name="forum_question"; // Table name 

// Connect to server and select databse.
include('config.php');

$sql="SELECT * FROM forum_question ORDER BY id DESC";
// OREDER BY id DESC is order result by descending
$db = config::connect();
$result=$db->query($sql);
$_SESSION['freshvisit']="1";

?>


<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
	
<tr>
	
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
</tr>

<?php

 

// Start looping table row
foreach ($result as $rows) {
	# code...
?>
<tr>
<td bgcolor="#FFFFFF"><?php echo $rows['id']; ?></td>
<td bgcolor="#FFFFFF"><a href="./forum/viewtopic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['view']; ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['reply']; ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['datetime']; ?></td>
</tr>

<?php
// Exit looping and close connection 
}
?>

<tr>
	<?php if (isset($_SESSION['username']))
	echo '
<td colspan="4" align="right" bgcolor="#E6E6E6"><a href="./forum/create_topic.php?user='.$_SESSION["username"].'"><strong>Create New Topic as '.$_SESSION["username"].'</strong> </a></td>
<td align="right" colspan="5" bgcolor="#E6E6E6"><a  href="logout.php">Logout</a><BR></td>
';
else
	echo '<td colspan="5" align="right" bgcolor="#E6E6E6">Please <a href="login.php"><strong>login </strong> </a>to be able to create a post</td>'; ?>
</tr>
</table>