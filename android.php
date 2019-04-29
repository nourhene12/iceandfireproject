<?php
include "../../config.php";
session_start();
include"../../core/crudProduit.php";
include "../../entities/Produit.php";
$db = config::getConnexion(); //appel fonction static sans new
$newproduit=crudProduit::AfficherNewProduit();
$produit=crudProduit::afficherProduitAndroid();
$all=crudProduit::AfficherAllNewProduits();
//var_dump($newproduit);


?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ice & Fire</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">

	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
<body>
<!-- header -->

    <nav id="colorlib-main-nav" role="navigation">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
        <div class="js-fullheight colorlib-table">
            <div class="colorlib-table-cell js-fullheight">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="search" placeholder="Entrer quelque chose pour rechercher...">
                            <button type="submit" class="btn btn-primary"><i class="icon-search3"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul>
                            <li class="active"><a href="index.php">Acceuil</a></li>
						    <li><a href="panier.html">Panier</a></li>
							
						    <li class="active"><a href="offre.html">offre</a></li>
						    <li><a href="maps/maps-gmap.html">Ou Nous Trouver</a></li>
                            


                            
                            
                    </div>
                </div>
            </div>
        </div>
    </nav>
	<div id="colorlib-page">
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="colorlib-navbar-brand">
                            <a class="colorlib-logo" href="index.html"><i class="flaticon-cutlery"></i><span>ICE &</span><span>FIRE</span></a>
                        </div>
                        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
                    </div>
                </div>
            </div>
        </header>
        <aside id="colorlib-hero">
            <div class="flexslider">
                <ul class="slides">
                <li style="background-image: url(images/1.jpg);" data-stellar-background-ratio="0.5">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
                                <div class="slider-text-inner text-center">
                                    <div class="desc">
                                        <span class="icon"><i class="flaticon-cutlery"></i></span>
                                        <h1>Nos Offres </h1>
                                        <p><span><a href="#">Acceuil</a></span> <span>Produits</span> <span> <a href="checkout.php">Panier</a></span></p>
                                        <div class="desc2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                </ul>
            </div>
        </aside>
<div class="colorlib-reservation reservation-page">
            <div class="container">
                <div class="row">
                    
					<div class="col-md-6 col-md-offset-3 text-center animate-box intro-heading">
                         <?php foreach ($produit as $android) {?>

                    <div class="col-md-4 products-right-grids-bottom-grid">

                        <div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            
                            <h4><a href="single.php"><?php echo $android['nomproduit']?></a></h4>
                            <p><?php echo $android['description']?></p>
                            <div class="simpleCart_shelfItem products-right-grid1-add-cart">
                                <p> <span class="item_price"><?php echo $android['prix']?> DT</span><a class="item_add" href="android.php?ajouter=<?php echo $android['idproduit']; ?>">add to cart </a></p>
                            </div>
                        </div>

                    </div>
                    <?php } ?>
                    <?php if (isset($_GET['ajouter']))
                        ajout($_GET['ajouter']);

                    ?>
					</div>
                
                </div>
            </div>
        </div>
        
	
	
	<div class="products">
		<div class="container">
			
			<div class="col-md-8 products-right">
				<div class="products-right-grid">
					<div class="products-right-grids animated wow slideInRight" data-wow-delay=".5s">
						
						<div class="clearfix"> </div>
					</div>

					<div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">

						<img src="../back/images/<?php echo $newproduit['imageproduit'];?>" class="img-responsive" />
						<div class="products-right-grids-position1">
							<h4><?php echo $newproduit["nomproduit"];?></h4>
                            <p><?php echo $newproduit["description"];?></p>
                            <p><?php echo $newproduit["prix"];?>DT</p>

                        </div>
					</div>
				</div>
                <div class="products-right-grids-bottom">
                    <?php foreach ($produit as $android) {?>

                    <div class="col-md-4 products-right-grids-bottom-grid">

                        <div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            
                            <h4><a href="single.php"><?php echo $android['nomproduit']?></a></h4>
                            <p><?php echo $android['description']?></p>
                            <div class="simpleCart_shelfItem products-right-grid1-add-cart">
                                <p> <span class="item_price"><?php echo $android['prix']?> DT</span><a class="item_add" href="android.php?ajouter=<?php echo $android['idproduit']; ?>">add to cart </a></p>
                            </div>
                        </div>

                    </div>
                    <?php } ?>
                    <?php if (isset($_GET['ajouter']))
                        ajout($_GET['ajouter']);

                    ?>


                   
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- footer -->
		<div class="colorlib-intro">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 text-center">
						<div class="intro animate-box">
							<span class="icon">
								<i class="icon-map4"></i>
							</span>
							<h2>Addresse</h2>
							<p>La corniche , Bizerte (à côté du café Maalouf)</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 text-center">
						<div class="intro animate-box">
							<span class="icon">
								<i class="icon-clock4"></i>
							</span>
							<h2>Ouverte à</h2>
							<p>Lundi - Dimanche</p>
							<span>14am - 00pm</span>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 text-center">
						<div class="intro animate-box">
							<span class="icon">
								<i class="icon-mobile2"></i>
							</span>
							<h2>téléphone</h2>
				            <p>+216 31 556 365</p>
				            <p>+216 22 234 567</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 text-center">
						<div class="intro animate-box">
							<span class="icon">
								<i class="icon-envelope"></i>
							</span>
							<h2>Email</h2>
							<p><a href="#">info@domain.com</a><br><a href="#">iceandfire@email.com</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		
			

				
					
		

		<footer>



<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Owl Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>

	<!-- Main JS (Do not remove) -->
	<script src="js/main.js"></script>

	</body>
</html>
<?php

function ajout($id)
{ $i=0;
    $db=config::getConnexion();
    $sql="select quantite from produit where idproduit=".$id;
    $req=$db->query($sql);
    $quantite=$req->fetch();
    if($quantite['quantite']<=0)
    { echo "<script> alert(\"Ce produit n\'est plus disponible dans le stock\"); </script>";}
    else
    {if (!isset($_SESSION['caddie']))
    {
        /* initialisation du panier */
        $_SESSION['caddie'] = array();

        /* Subdivision du panier */
        $_SESSION['caddie']['id'] = array();

    }
        foreach ($_SESSION['caddie']['id']  as $value)
        {
            if($value==$id)
                $i=1;
        }
        if($i==0)
            array_push($_SESSION['caddie']['id'], $id);

    } }

 ?>


