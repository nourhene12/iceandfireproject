<?php
   include 'action.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="ghassen namouchi">
  <meta http-equiv="X-UA-compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initiam-scale=1,shrink-to-fit=no">
  <title>ICE&FIRE</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

 <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 mt-3 bg-info  p-4 rounded">
      <h2 class="bg-light p-2 rounded text-center text-dark">ID:<?= $vid; ?></h2>
      <div class"text-center">
        <img src="<?= $vphoto; ?>" width="300" class="img-thumbnail">      
      </div>
      <h4 class="text-light">Nom: <?= $vname; ?></h4>
      <h4 class="text-light">Type: <?= $vtype; ?></h4>
      <h4 class="text-light">Prix: <?= $vprix; ?></h4>

    </div>
    </div>
  </div>
   

</nav>
</body>
</html>