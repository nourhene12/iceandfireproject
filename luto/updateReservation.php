<?php
include_once 'reserv1.php';
/**
 *  Affich Doc
 */
$id=$_GET['p'];
echo $id;

$reserv=new Reservation();
$res=$reserv->selectReservation($id);
foreach($res as $row) {}
/*
 * Recupération des données soumis par l'utilsateur
 */
if(isset($_POST['modifier'])){
    if(isset($_POST['modifier'])){
    $nouveau_reserv = new Reservation();
    $nouveau_reserv->setnom($_POST['nom']);
    $nouveau_reserv->setprenom($_POST['prenom']);

    $nouveau_reserv->setDate($_POST['date']);
    $nouveau_reserv->setdescriptionreservation($_POST['description']);
    $nouveau_reserv->setEmail($_POST['email']);
    $nouveau_reserv->setPhone($_POST['phone']);
    $nouveau_reserv->setTime($_POST['time']);
    $nouveau_reserv->updateReservation($nouveau_reserv,$id);
    }
}
?>

<!DOCTYPE HTML>
<html>
    <head>
    <meta charset="utf-8">
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
                            <li><a href="index.html">Acceuil</a></li>
                                <li ><a href="reclamation.php">Réclamation</a></li>
                            <li><a href="temoignage.php">Qu'en-pensez-vous ?</a></li>
                            <li class="active"><a href="reservation.php">Reservation</a></li>

                            
                            
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
                <li style="background-image: url(images/iceandfire.jpg);" data-stellar-background-ratio="0.5">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
                                <div class="slider-text-inner text-center">
                                    <div class="desc">
                                        <span class="icon"><i class="flaticon-cutlery"></i></span>
                                        <h1>Modifier votre reservation</h1>
                                        <p><span><a href="#">Acceuil</a></span> <span>reservation</span></p>
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
                            <h2>Téléphone</h2>
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

        <div class="colorlib-reservation reservation-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center animate-box intro-heading">
                        <h2>Modifier votre réservation</h2>
                          <p>Prenez quelques minutes pour mettre en place votre réservation ,vous gagnerez des heures et des heures chaque semaine !</p>
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
                                                <label for="nom">Nom</label>
                                                <div class="form-field">
                                                   <input input type="text" name="nom" class="form-control" placeholder="nom" value="<?php echo $row['nom']; ?>"  onkeyup="validatetext(this)">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-6 animate-box">
                                            <div class="form-group">
                                                <label for="prenom">Prénom</label>
                                                <div class="form-field">
                                                   <input input type="text" name="prenom" class="form-control" placeholder="prenom" value="<?php echo $row['prenom']; ?>"  onkeyup="validatetext(this)">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-6 animate-box">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <div class="form-field">
                                                    <input type="text" class="form-control" placeholder="email" name ="email" onchange="email_validate(this.value)">
                                                    <div class="status2" id="status2" style="color: red; margin-left: 20px"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 animate-box">
                                            <div class="form-group">
                                                <label for="phone">téléphone</label>
                                                <div class="form-field">
                                                    <input type="text" class="form-control" placeholder="phone" name="phone"onkeyup="validatephone(this)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 animate-box">
                                            <div class="form-group">
                                                <label for="date">Date de visite:</label>
                                                <div class="form-field">
                                                    <i class="icon icon-calendar2"></i>
                                                <input type="text" name="date" id="date" class="form-control date" placeholder="date" value="<?php echo $row['date']; ?>"> 
                                              </div>
                                            </div>
                                        </div>
                                          <div class="col-md-6 animate-box">
                                            <div class="form-group">
                                                <label for="time">Heure</label>
                                                <div class="form-field">
                                                    <i class="icon icon-arrow-down3"></i>
                                                    <select name="time" id="time" class="form-control">
                                                        <option value="#">6:30am</option>
                                                        <option value="#">7:00am</option>
                                                        <option value="#">7:30am</option>
                                                        <option value="#">8:00am</option>
                                                        <option value="#">8:30am</option>
                                                        <option value="#">9:00am</option>
                                                        <option value="#">9:30am</option>
                                                        <option value="#">10:00am</option>
                                                        <option value="#">10:30am</option>
                                                        <option value="#">11:00am</option>
                                                        <option value="#">11:30am</option>
                                                        <option value="#">12:00am</option>
                                                        <option value="#">12:30am</option>
                                                        <option value="#">1:00pm</option>
                                                        <option value="#">1:30pm</option>
                                                        <option value="#">2:00pm</option>
                                                        <option value="#">2:30pm</option>
                                                        <option value="#">3:00pm</option>
                                                        <option value="#">3:30pm</option>
                                                        <option value="#">4:00pm</option>
                                                        <option value="#">4:30pm</option>
                                                        <option value="#">5:00pm</option>
                                                        <option value="#">5:30pm</option>
                                                        <option value="#">6:00pm</option>
                                                        <option value="#">6:30pm</option>
                                                        <option value="#">7:00pm</option>
                                                        <option value="#">7:30pm</option>
                                                        <option value="#">8:00pm</option>
                                                        <option value="#">8:30pm</option>
                                                        <option value="#">9:00pm</option>
                                                        <option value="#">9:30pm</option>
                                                        <option value="#">10:00pm</option>
                                                        <option value="#">10:30pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                       

                                         <div class="col-md-6 animate-box">
                                            <div class="form-group">
                                                <label for="description">Votre description : </label>
                                                <div class="form-field">
                                             <textarea type="" name="description" class="form-control" rows="3" cols="21"><?php echo htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                           
                                        <div class="col-md-12 animate-box">
                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-4">
                                                    <input type="submit" name="modifier" value="Modifier" class="btn btn-primary btn-block" >
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
    

    <!-- jQuery -->
    <script>
    function validatephone(phone)
        {
            var maintainplus = '';
            var numval = phone.value
            if ( numval.charAt(0)=='+' )
            {
                var maintainplus = '';
            }
            curphonevar = numval.replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬éèêàâîïçÉÈÊÀÂÎÏÇ"§\-()\]\[]/g,'');
            phone.value = maintainplus + curphonevar;
            var maintainplus = '';
       


         phone.focus;
        }
        function validatetext(txt) {
            txt.value = txt.value.replace(/[^a-zA-Z-éèêàâîïçÉÈÊÀÂÎÏÇ'\n\r.]+/g, '');
        }
        function email_validate(email)
        {
            var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

            if(regMail.test(email) == false)
            {
                document.getElementById("status2").innerHTML    = "<span class='warning'>Adresse mail non valide.</span>";
            }else {
                document.getElementById("status2").innerHTML    = "";
            }
        }
    </script>
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

