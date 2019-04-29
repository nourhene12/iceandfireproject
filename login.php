<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
include 'config.php'; 
if($_SERVER['REQUEST_METHOD']='POST')
{

if(isset($_POST['username']) and isset($_POST['password']))
{
  $sql="SElECT * From users where username=:usr and password=:psrd";
        $db = config::connect();
        try{
        $req=$db->prepare($sql);
        $req->bindValue(':usr',$_POST['username']);
        $req->bindValue(':psrd',$_POST['password']);
        $req->execute();
        $res=$req->fetchall();
        //echo $res[0]['email'];
        if($res!="")
        {
            echo "230";
            session_start();
            $_SESSION['username']=$_POST['username'];
            $_SESSION['email']=$res['0']['email'];
            $_SESSION['freshvisit']="1";
            //header('location: index.php');

        }

}
catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}
}



?>

<!-- no additional media querie or css is required -->
<div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <form method="post" autocomplete="off">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                            <button type="submit" id="sendlogin" class="btn btn-primary">login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>