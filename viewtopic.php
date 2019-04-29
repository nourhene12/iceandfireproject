<?php

session_start();
include('config.php');
$tbl_name="forum_question"; // Table name 

// Connect to server and select databse.

// get value of id that sent from address bar 
$id=$_GET['id'];

$db = config::connect();
if(isset($_SESSION['username']) and $_SESSION['freshvisit']=="1")
{

	$_SESSION['freshvisit']="0";
	$sql="update $tbl_name set view=view+1 where id=:id";
	

$req=$db->prepare($sql);
$req->bindvalue('id',$id);
$req->execute();
}
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=$db->query($sql);


foreach ($result as $rows) {
	# code...
?>
<?php include ('header.php'); ?>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#F8F7F1"><strong><?php echo $rows['topic']; ?></strong></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><?php echo $rows['detail']; ?></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><strong>By :</strong> <?php echo $rows['name']; ?> <strong>Email : </strong><?php echo $rows['email'];?></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><strong>Date/time : </strong><?php echo $rows['datetime']; ?></td>
</tr>
</table></td>
</tr>
</table>
<BR>
<?php
}
$tbl_name2="forum_answer"; // Switch to table "forum_answer"

$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
$db = config::connect();
$result=$db->query($sql2);

foreach ($result as $rows) {
?>

<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#F8F7F1"><strong>ID</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['a_id']; ?></td>
</tr>
<tr>
<td width="18%" bgcolor="#F8F7F1"><strong>Name</strong></td>
<td width="5%" bgcolor="#F8F7F1">:</td>
<td width="77%" bgcolor="#F8F7F1"><?php echo $rows['a_name']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Email</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['a_email']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Answer</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['a_answer']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Date/Time</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['a_datetime']; ?></td>
</tr>
</table></td>
</tr>
</table><br>

 

<?php
}
?>

<?php if(isset($_SESSION['username'])) 
{?>
<form action="addanswer.php" method="post" class="form-horizontal" id="form1" name="form1">
                                   
                                    <br>
                                    
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="a_name" name="a_name" placeholder="Title" value="<?php echo $_SESSION['username'];?>" class="form-control" ></div>
                                    <br>
                                    
                                        <div class="col col-md-3"><label for="description-input" class=" form-control-label">Email</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="a_email" name="a_email" value="<?php echo $_SESSION['email'];?>" placeholder="Enter post description" class="form-control" ></div>
                                    
                                    <br>
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Answer body</label></div>
                                        <div class="col-12 col-md-9"><textarea name="a_answer" id="a_answer" rows="9" placeholder="Content..." class="form-control" ></textarea></div>
                                    
                                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="submit" form="form1" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" form="form1" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>

<?php } 
else
 echo "<h5 bgcolor='#E6E6E6' align='center'>Please <a href='login.php' >login</a> to be able to reply</h5>"; ?>


<?php include('footer.php'); ?>