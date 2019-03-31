<?php
ob_start();
include_once "../entities/client.php";
include_once "Config.php";
if (isset($_POST["valider"])) {
    $nouveau_client = new Client();
    $nouveau_client->setNom($_POST['Nom']);
    $nouveau_client->setPrenom($_POST['Prenom']);
    $nouveau_client->setPhoto($_POST['Photo']);
    $nouveau_client->setCIN($_POST['CIN']);
    $nouveau_client->setID($_POST['ID']);
    $nouveau_client->setmail($_POST['mail']);
    $nouveau_client->setTel($_POST['Tel']);
    $nouveau_client->setPWD($_POST['PWD']);
    $nouveau_client->insertclient($nouveau_client);
}
?>
<!DOCTYPE html>
<html>
    <head>
  <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_Nom" content=""/>
    <meta property="og:description" content=""/>
    <meta Nom="twitter:title" content="" />
    <meta Nom="twitter:image" content="" />
    <meta Nom="twitter:url" content="" />
    <meta Nom="twitter:card" content="" />

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
<script>
        function affiche() {
            var a = document.getElementById("affiche");
            a.style.display = "block";
        }
    </script>
    </head>
    <body>

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
                            <li><a href="index.php">Acceuil</a></li>
                            <li ><a href="client.php">Réclamation</a></li>
                            <li><a href="livraison.php">Livraison</a></li>
                            <liclass="active"><a href="client.php">S'inscrire</a></li>
                            <li><a href="temoignage.php">Qu'en-pensez-vous ?</a></li>


                            
                            
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
                                        <h1>Faire votre client </h1>
                                        <p><span><a href="#">Acceuil</a></span> <span>Réclamation</span> <span>Inscription</span></p>
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

        <div class="colorlib-intro">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 text-center">
                        <div class="intro animate-box">
                            <span class="icon">
                                <i class="icon-map4"></i>
                            </span>
                            <h2>Adresse</h2>
                            <p>La corniche ,Bizerte (à côté du café Maalouf)</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 text-center">
                        <div class="intro animate-box">
                            <span class="icon">
                                <i class="icon-clock4"></i>
                            </span>
                            <h2>Ouverte</h2>
                            <p>Lundi - Dimanche</p>
                            <span>14am - 00pm</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 text-center">
                        <div class="intro animate-box">
                            <span class="icon">
                                <i class="icon-mobile2"></i>
                            </span>
                            <h2>TéléTel</h2>
                            <p>+216 31 556 365</p>
                            <p>+216 22 234 567</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 text-center">
                        <div class="intro animate-box">
                            <span class="icon">
                                <i class="icon-envelope"></i>
                            </span>
                            <h2>mail</h2>
                            <p><a href="#">info@domain.com</a><br><a href="#">iceandfire@mail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="colorlib-reservation reservation-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center animate-box intro-heading">
                        <h2>Pour vous inscrire, veuillez remplir ce formulaire</h2>
                         
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" class="colorlib-form">
                                <div class="row">
                                        <div class="col-md-6 animate-box">
                                            <div class="form-group">
                                                <label for="Nom">Nom</label>
                                                <div class="form-field">
                                                <input type="text" class="form-control" placeholder="Nom" Nom="Nom" onkeyup="validatetext(this)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 animate-box">
                                            <div class="form-group">
                                                <label for="mail">mail</label>
                                                <div class="form-field">
                                                    <input type="text" class="form-control" placeholder="mail" Nom ="mail" onchange="mail_validate(this)">
                                                    <div class="status2" id="status2" style="color: red; margin-left: 20px"></div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 animate-box">
                                            <div class="form-group">
                                                <label for="Prenom">Prenom</label>
                                                <div class="form-field">
                                                    <input type="text" class="form-control" placeholder="Prenom" Nom ="Prenom" onchange="validate(this)">
                                                    <div class="status2" id="status2" style="color: red; margin-left: 20px"></div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 animate-box">
                                            <div class="form-group">
                                                <label for="Tel">Tel</label>
                                                <div class="form-field">
                                                    <input type="text" class="form-control" placeholder="Tel" Nom="Tel"onkeyup="validateTel(this)">
                                                </div>
                                            </div>
                                        </div>

                                       
                                       
                                         <div class="col-md-6 animate-box">
                                            <div class="form-group">
                                                <label for="ID">ID</label>
                                                <div class="form-field">
                                                    <input type="text" class="form-control" placeholder="ID" Nom ="ID" onchange="validate(this)">
                                                    <div class="status2" id="status2" style="color: red; margin-left: 20px"></div>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-md-6 animate-box">
                                            <div class="form-group">
                                                <label for="PWD">PWD</label>
                                                <div class="form-field">
                                                    <input type="text" class="form-control" placeholder="PWD" Nom ="PWD" onchange="validate(this.)">
                                                    <div class="status2" id="status2" style="color: red; margin-left: 20px"></div>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-md-6 animate-box">
                                            <div class="form-group">
                                                <label for="CIN">CIN</label>
                                                <div class="form-field">
                                                    <input type="text" class="form-control" placeholder="CIN" Nom ="CIN" onchange="validate(this)">
                                                    <div class="status2" id="status2" style="color: red; margin-left: 20px"></div>
                                                </div>
                                            </div>
                                        </div>


                                         <div class="col-md-6 animate-box">
                                            <div class="form-group">
                                                <label for="Photo">Photo</label>
                                                <div class="form-field">
                                                    <input type="text" class="form-control" placeholder="Photo" Nom ="Photo" onchange="validate(this)">
                                                    <div class="status2" id="status2" style="color: red; margin-left: 20px"></div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12 animate-box">
                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-4">
                                                    <input type="submit" Nom="valider" id="submit" value="S'inscrire" class="btn btn-primary btn-block" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                 

       <div class="colorlib-intro">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 text-center">
                        <div class="intro animate-box">
                            <span class="icon">
                                <i class="icon-map4"></i>
                            </span>
                            <h2>Adresse</h2
                            <p>La corniche ,Bizerte (à côté du café Maalouf)</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 text-center">
                        <div class="intro animate-box">
                            <span class="icon">
                                <i class="icon-clock4"></i>
                            </span>
                            <h2>Ouverte</h2>
                            <p>Lundi - Dimanche</p>
                            <span>14am - 00pm</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 text-center">
                        <div class="intro animate-box">
                            <span class="icon">
                                <i class="icon-mobile2"></i>
                            </span>
                            <h2>TéléTel</h2>
                            <p>+216 31 556 365</p>
                            <p>+216 22 234 567</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 text-center">
                        <div class="intro animate-box">
                            <span class="icon">
                                <i class="icon-envelope"></i>
                            </span>
                            <h2>mail</h2>
                            <p><a href="#">info@domain.com</a><br><a href="#">iceandfire@mail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="colorlib-reservation reservation-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center animate-box intro-heading">
                        <h2>Afficher les clients </h2>
                        </div>
						  <p style="display: none;" id="affiche">
                        <?php
                        $d = new client();
                        $d->afficherClient();
                        if(isset($_POST['supprimer'])){
                            $d->supprimerClient($_POST['ref']);
                        }
                        ?>
                       </p>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" class="colorlib-form">
                                <div class="row">

                                       

                                        <div class="col-md-12 animate-box">
                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </body>
        <footer>
            <div id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-pb-sm">
                            <h2>Haythem kharbech</h2>
                            <p>je suis le fondateur de ICE&FIRE , soyez le bienvenue</p>
                            <p class="colorlib-social-icons">
                                <a href="#"><i class="icon-facebook4"></i></a>
                                <a href="#"><i class="icon-twitter3"></i></a>
                                <a href="#"><i class="icon-googleplus"></i></a>
                                <a href="#"><i class="icon-dribbble2"></i></a>
                            </p>
                        </div>
                        <div class="col-md-3 col-pb-sm">
                            <h2>Dérnier Blog</h2>
                            <div class="f-entry">
                                <a href="#" class="featured-img" style="background-image: url(images/drink-9.jpg);"></a>
                                <div class="desc">
                                    <span>Le 5 mai, 2018</span>
                                    <h3><a href="#">Comment faire les jus</h3>
                                </div>
                            </div>
                            <div class="f-entry">
                                <a href="#" class="featured-img" style="background-image: url(images/drink-6.jpg);"></a>
                                <div class="desc">
                                    <span>Le 5 mai, 2018</span>
                                    <h3><a href="#">Des jus frais </a></h3>
                                </div>
                            </div>
                            <div class="f-entry">
                                <a href="#" class="featured-img" style="background-image: url(images/dessert-7.jpg);"></a>
                                <div class="desc">
                                    <span>le 5 mai, 2018</span>
                                    <h3><a href="#">Une recette spéciale</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-pb-sm">
                            <h2>Instagram</h2>
                            <div class="instagram">
                                <a href="#" class="insta-img" style="background-image: url(images/dessert-6.jpg);"></a>
                                <a href="#" class="insta-img" style="background-image: url(images/dessert-7.jpg);"></a>
                                <a href="#" class="insta-img" style="background-image: url(images/drink-6.jpg);"></a>
                                <a href="#" class="insta-img" style="background-image: url(images/drink-9.jpg);"></a>
                            </div>
                        </div>
                        
                                
        </footer>
    
    </div>



<script >
           function validateTel(Tel)
        {
            var maintainplus = '';
            var numval = Tel.value
            if ( numval.charAt(0)=='+' )
            {
                var maintainplus = '';
            }
            curTelvar = numval.replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬éèêàâîïçÉÈÊÀÂÎÏÇ"§\-()\]\[]/g,'');
            Tel.value = maintainplus + curTelvar;
            var maintainplus = '';
       


         Tel.focus;
        }
        function validatetext(txt) {
            txt.value = txt.value.replace(/[^a-zA-Z-éèêàâîïçÉÈÊÀÂÎÏÇ'\n\r.]+/g, '');
        }
        function mail_validate(mail)
        {
            var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

            if(regMail.test(mail) == false)
            {
                document.getElementById("status2").innerHTML    = "<span class='warning'>Adresse mail non valide.</span>";
            }else {
                document.getElementById("status2").innerHTML    = "";
            }
        }
    
    </script>
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
    <!---création d'un bloc avec JS pour afficher la liste des livres si l'utilisateur clique "afficher"---->

</html>
ob_end_flush();
?>
