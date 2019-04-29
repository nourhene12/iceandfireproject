
<?php
// include "../../config.php";
include "../../entities/Commande.php";
include "../../core/CommandeC.php";
include "../../entities/LigneCommande.php";
include "../../core/LigneCommandeC.php";
include "../../core/userC.php";
include '../../entities/Facture.php';
session_start();
if (!isset($_SESSION['caddie']))
{
    /* initialisation du panier */
    $_SESSION['caddie'] = array();

    /* Subdivision du panier */
    $_SESSION['caddie']['id'] = array();

}

$_SESSION['caddie']['prix']=array();
if (isset($_GET['supprimer']))
{SupprimerProduits($_GET['supprimer']);
}



Function SupprimerProduits($idSuppr)
{

    $panier_temporaire=$_SESSION['caddie'];

    for ($i=0;$i<count($panier_temporaire['id']);$i++)
    {



        if($panier_temporaire['id'][$i] == $idSuppr)
            array_splice($panier_temporaire['id'],$i,1);

    }
    $_SESSION['caddie']=$panier_temporaire;

}
$db = config::getConnexion(); //appel fonction static sans new



?>
<!--Génération facture -->
<?php
if(isset($_POST["Livraison"]))
{
    header("Location:livraisonchoix.php");
}

if(isset($_POST["Facture"]))
{
    require_once('../../tcpdf/tcpdf.php');
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE, 10);
    $obj_pdf->SetFont('helvetica', '', 12);
    $obj_pdf->AddPage();
    ob_start();
    include('pdf.php');
    $html = ob_get_contents();
    ob_end_clean();


    $obj_pdf->writeHTML($html, true, false, true, false, '');
    ob_clean();
    $obj_pdf->Output('sample.pdf', 'I');
}
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
	   <script src="js/jquery.min.js"></script>
	   <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
		<script src="js/jquery.min.js"></script>
		 <script>
        new WOW().init();
    </script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	
	<![endif]-->

	</head>
<body>
<?php
                    if (ISSET($_SESSION['type']) && ISSET($_SESSION['username'])) {
                        if ($_SESSION['type'] == 1) {
                            ?>
                            <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="../back/index.php">Admin Dashboard</a></li>
                            <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="../../core/logout.php">Se déconnecter</a></li>
                            <?php
                        } else {?>
                            <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="#">Profile</a></li>
                            <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="../../core/logout.php">Se déconnecter</a></li>
                            <?php
                        }
                    }else{
                    ?>
                    <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="login.php">Login</a></li>
                    <li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="register.php">Register</a>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
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
						    <li><a href="produits.php">Produits</a></li>
							
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
                                        <h1>Votre Panier </h1>
                                        <p><span><a href="#">Acceuil</a></span> <span><a href="produits.php">Produits</a></span> <span> <a href="checkout.php">Panier</a></span></p>
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

<!-- Total-->



<script>
    $(document).ready(function($){

        $("*").mouseover(function(){

            var total=0;
            var j;
            var table=document.getElementById("tab");
            var lignes=(table.rows.length);
            var i=0;
            for(j=1;j<lignes;j++)
            {
                var row=table.rows[j];

                var str="myselect"+i;

                total=total+((document.getElementById(str).value)*(row.cells[4].firstChild.nodeValue));



                i++;
            }




            return document.getElementById("totalht").value=total;
        });
    });



</script>

<script>

    function checkCoupon() {

        var coupon=document.getElementById("coupon").value;
        if (coupon==="")
        {
            alert("Verifier votre coupon");
        }else
        {
            $.ajax({
                url:'checkcoupon.php',
                type:"POST",
                data:{
                    "coupon":coupon
                } ,

                async:true,
                success:function (data) {
                    if(data.codepromo != "")
                    {
                        var newprix=document.getElementById("totalht").value - (document.getElementById("totalht").value *0.5) ;
                        document.getElementById("totalfinal").value = newprix ;
                    }
                    else
                    {
                        alert(data);
                    }

                },
                error:function (data) {
                    alert("erreur");
                }


            });
        }

    }



</script>
      

<!-- checkout -->
<div class="checkout">
    <div class="container">

        <div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">

            <form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


                <table class="timetable_sub" id="tab">
                    <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Produit</th>
                        <th>Quantite</th>
                        <th>Nom du produit</th>
                        <th>Prix Unitaire(dt)</th>
                        <th>Retirer</th>
                    </tr>
                    </thead>
                    <?php $db=config::getConnexion();
                    $_SESSION['num']=0;
                    if(isset($_SESSION['caddie']))
                    {
                        if(!empty($_SESSION['caddie']['id']))
                        {
                            foreach($_SESSION['caddie']['id'] as $value)
                            {

                                $i=1;
                                $db=config::getConnexion();
                                $sql="SELECT * FROM `produit` WHERE `idproduit` =".$value;
                                $result= $db->query($sql);
                                foreach($result->fetchAll() as $prod)
                                {

                                    $idProd=$prod['idproduit'];
                                    if(!isset($_SESSION['quantite'.$idProd]))
                                        $_SESSION['quantite'.$idProd]=1;

                                    $nomProd=$prod['nomproduit'];
                                    $imageProd=$prod['imageproduit'];
                                    $prixProd=$prod['prix'];
                                    $quantite=$prod['quantite'];
                                    ajout($prod['prix']);
                                }


                                if(isset($_POST["plus".$idProd]))
                                {
                                    if(verifierQuantitePlus($_SESSION['quantite'.$idProd],$quantite)==true)
                                    {$_SESSION['quantite'.$idProd]++;
                                        echo $_SESSION['quantite'.$idProd];}}
                                if(isset($_POST["moins".$idProd]))
                                { if(verifierQuantiteMoins($_SESSION['quantite'.$idProd])==true)
                                {$_SESSION['quantite'.$idProd]--;
                                    echo $_SESSION['quantite'.$idProd];}}

                                ?>

                                <tr class="rem1">
                                    <td class="invert"><?php echo $_SESSION["num"]; ?></td>
                                    <td class="invert-image"><a href="single.php"><img src=../back/images/<?php echo $imageProd ?> class="img-responsive" /></a></td>
                                    <td class="invert" value="<?php echo $_SESSION['quantite'.$idProd] ?>">
                                        <div class="quantity" >
                                            <div class="quantity-select">
                                                <select name="<?php echo "myselect".$_SESSION["num"] ?>" id="<?php echo "myselect".$_SESSION["num"] ?>">
                                                    <?php for($i=1;$i<$quantite+1;$i++) {?>
                                                        <option value="<?php echo $i ?>"><?php echo $i ?>				</option>	 <?php } ?>
                                                </select>
                                                <?php $_SESSION["num"]++; ?>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="invert"><?php echo $nomProd ?></td>

                                    <td class="invert"><?php echo $prixProd ?> </td>
                                    <td class="invert">
                                        <div class="rem">

                                            <a class="close1" href="http://localhost/SiteProjet/views/front/checkout.php?supprimer=<?php echo $idProd ?>"> </a>


                                        </div>

                                    </td>
                                </tr>


                            <?php 		}

                        }
                    }
                    ?> </table>





        </div>
        <div class="checkout-left">
            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">


                <h4>Continue to basket</h4>
                <ul>

                    <?php if(!empty($_SESSION['caddie']['id']))
                    {$result= $db->query($sql);
                        $i=1;
                        foreach($_SESSION['caddie']['prix'] as $value)
                        {
                            echo "<li>Product".$i."<i>-</i> <span>".$value."</span></li>";
                            $i++;

                        } }?>

                    <li>Total <i>-</i> <input type="text" name="totalht" id="totalht" value="<?php if(!isset($_POST["totalht"])) echo 0; else echo $_POST["totalht"] ?>" readonly="readonly"> </li>
                    <li>Coupon <input type="text" id="coupon" name="coupon" > <button type="button" onclick="checkCoupon()">Check</button></li>
                    <li>Total Final <input type="text" id="totalfinal" name="totalfinal" readonly="readonly" ></li>
                </ul>


                <?php if(isset($_SESSION['id'])) { ?>
                    <input type="submit" value="Passer votre Commande" name="PasserCommande" style="background: #FFC229;color: #fff;    padding: 1em;    margin: 0 0 1em;"> <?php } ?>
                <?php if(isset($_POST['PasserCommande']))
                {echo "<input type=submit name=Facture style=background:#FFC229;color: #fff;    padding: 1em;    margin: 0 0 1em; value=GénérerFacture>";
                    echo "<input type=submit name=Livraison style=background:#FFC229;color: #fff;    padding: 1em;    margin: 0 0 1em; value=LivrerCommande>";}
                ?>



                <!--Ajout Commande-->
                <?php
                if(isset($_SESSION['caddie']['id']))
                {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST['PasserCommande'])) {
                            $com = new Commande(NULL, date("Y-m-d"), $_SESSION['id'], $_POST["totalht"], $_POST["totalht"]);
                            $_SESSION['totalht'] = $_POST["totalht"];
                            if (isset($_POST["totalfinal"])) {
                                if ($_POST["totalfinal"] != 0) {
                                    $com->setTotal_ht($_POST["totalfinal"]);
                                    $com->setTotal_ttc($_POST["totalfinal"]);
                                    $_SESSION['totalht'] = $_POST["totalfinal"];
                                } else {
                                    $com->setTotal_ht($_POST["totalht"]);
                                    $com->setTotal_ttc($_POST["totalht"]);
                                    $_SESSION['totalht'] = $_POST["totalht"];

                                }
                            }


                            $comC = new CommandeC();

                            $comC->ajouterCommande($com);
                            $result = $comC->recupererDerniereCmd($_SESSION['id']);
                            foreach ($result as $value) {
                                $_SESSION['idCmd'] = $value['idCmd'];
                                $dateEcheance = strtotime("+2 weeks");

                                $fa = new Facture(NULL, $value['dateCmd'], $value['total_ttc'], $value['idCmd'], date("Y-m-d", $dateEcheance));


                            }
                            $fac = new FactureC();
                            $fac->ajouterFacture($fa);

                            foreach ($_SESSION['caddie']['id'] as $value) {
                                $i = 0;
                                $db = config::getConnexion();
                                $sql = "SELECT * FROM `produit` WHERE `idproduit` =" . $value;
                                $result = $db->query($sql);
                                foreach ($result->fetchAll() as $prod) {
                                    $nomProd = $prod['nomproduit'];
                                    $imageProd = $prod['imageproduit'];
                                    $prixProd = $prod['prix'];
                                    $ligne = new LigneCommande(NULL, $_SESSION['idCmd'], $prod['idproduit'], $prod['prix'], $_POST['myselect' . $i], 0);
                                    $ligneC = new LigneCommandeC();
                                    $ligneC->ajouterLigne($ligne);
                                    $i++;

                                }
                                $com = new CommandeC();
                                $com->reduireStock($_SESSION['idCmd'], $value);

                            }
                        }
                    }
                }
                ?>

                </form>
            </div> <br>


            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href="single.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
                <a href="pagelivraison.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>llivraison</a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //checkout -->
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
function ajout($prix)
{ $i=0;
    foreach ($_SESSION['caddie']['prix'] as $value)
    {
        if ($value==$prix)
            $i=1; }
    if($i==0)
        array_push($_SESSION['caddie']['prix'], $prix);

} ?>
</body>
</html>
<?php
function verifierQuantitePlus($q,$s)
{  echo "q=".$q."<br>";
    if($s-$q<=0)
    {   $quantiteErr="*Ce produit n'est plus disponible dans le stock";
        return false;}
    else
        return true;

}
function verifierQuantiteMoins($q)
{  echo "q=".$q."<br>";
    if($q<=0)
        return false;
    else
        return true;

}


?>

