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
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">ICE&FIRE</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" href="#">produits</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">catégories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">statistique</a>
      </li> 
    </ul>
    <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-primary" type="submit">Search</button> 
  </form>
  </div>
  
</nav>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-10">
		 <h3 class="text-center text-dark mt-2">Vous pouvez gérer vos produits ICI</h3>	
		 <hr>
     <?php if (isset($_SESSION['response'])) { ?>
     <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?= $_SESSION['response']; ?> 
    </div>
    <?php } unset($_SESSION['response']); ?>
		</div>
	</div>

	<div class="row">

        <div class="col-md-4">
        <h3 class="text-center text-info">add record</h3>
        <hr>
        	<form action="action.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $id1;  ?>">
        	<div class="form-group">
        		<input type="text" name="name" value="<?= $name;  ?>" class="form-control" placeholder="Entrer le nom" required>
        	</div>
        	<div class="form-group">
        		<input type="text" name="type" value="<?= $type;  ?>" class=" form-control" placeholder="Entrer le type" required>
        	</div>
        	<div class="form-group">
        		<input type="tel" name="prix" value="<?= $prix;  ?>" class="form-control" placeholder="Entrer le prix" required>
        	</div>
        	<div class="form-group">
            <input type="hidden" name="oldimage" value="<?= $photo; ?>" >
        		<input type="file" name="image" class="custom-file">
            <img src="<?= $photo; ?>" width="120" class="img-thumbnail">
        	</div>
        	<div class="form-group">
            <?PHP if($update==true){ ?>
                  <input type="submit" name="Modifier" class="btn btn-success btn-block" value="modifier le produit">
        <?php } else{ ?>
        		<input type="submit" name="ajouter" class="btn btn-primary btn-block" value="ajouter le produit">
          <?php } ?>
        	</div>
            </form>
        </div>
        <div class="col-md-8">
          <?php
      
    $produitc1=new produitc();
$listeproduits=$produitc1->afficherproduits();

      ?>
        	<h3 class="text-center text-info">Vos informations</h3>
        	<table class="table  table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Image</th>
        <th>nom</th>
         <th>type</th>
          <th>prix</th>
          <th>Actions</th>
      </tr>
    </thead>
    <tbody>
     <?php
     foreach ($listeproduits as $row){
     ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><img src="<?php echo $row['photo']; ?>" width="40"></td>
        <td><?php echo $row['nom']; ?></td>
        <td><?php echo $row['type']; ?></td>
        <td><?php echo $row['prix']; ?></td>
        <td>
        <a href="details.php?details=<?= $row['id']; ?>" class="badge badge-primary p-2">Details</a> |
         <a href="action.php?supprimer=<?= $row['id']; ?> " class="badge badge-danger p-2" onclick="return confirm('voulez vous supprimer cet article?');">Supprimer</a> |
          <a href="index.php?edit=<?= $row['id']; ?>" class="badge badge-success p-2">Modifier</a> |
          </td>
      </tr>
      <?php 
    }
    ?>
    </tbody>
  </table>
        </div>
     </div>
   </div>
</body>
</html>