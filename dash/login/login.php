<?php
$con=mysql_connect("localhost","root","");
if(!$con)
{
echo "Could not establish connection".mysqli_error($con);
}
$db=mysql_select_db("ice&fire",$con);

if (!$db){
die("Database Selection Failed" . mysqli_error($con));
}
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query="select * from login where username='$username'and password='$password'";
    $result=mysql_query($query);
    while($row=mysql_fetch_array($result)){
        if($row['username']==$username && $row['password']==$password && $row['type']=='admin'){
            header('Location: ../views/index.html');
        }else if($row['username']==$username && $row['password']==$password && $row['type']=='user'){
            header('Location: ../version/views/index.php');
        }
    }
}
?> 
<!doctype html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <div class="loginbox">
    <img src="avatar.png" class="avatar">
        <h1>Login Here</h1>
        <form method="POST">
            <p>Username</p>
            <input id="username"type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input  id="password" type="password" name="password" placeholder="Enter Password">
           <input type="submit" name="submit" class="btn btn-primary btn-block" value="Login" id="submit">
        </form>
        
    </div>
       

</body>

</html>
