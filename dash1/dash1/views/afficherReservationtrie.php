<?php
include "../corp/reserv1.php";
$reservC=new Reservation();
$listeReservations=$reservC->afficherReservationsT();

//var_dump($listeEmployes->fetchAll());
?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ICE & FIRE Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->
 <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="indexxx.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">UI elements</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bookmark"></i>Consulter</a>
                      <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-envelope"></i><a href="api.php">API</a></li>
                        <li><i class="menu-icon fa fa-heart"></i><a href="avis.php">Avis</a></li>
                    </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bookmark"></i>Gérer vos produits</a>
                      <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-envelope"></i><a href="index1.php">Produits</a></li>
                        <li><i class="menu-icon fa fa-heart"></i><a href="index2.php">Catégories</a></li>
                    </ul>
                    </li>
                     <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bookmark"></i>Gérer vos événements</a>
                      <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-envelope"></i><a href="tables-basic.php">Evenements</a></li>
                        <li><i class="menu-icon fa fa-heart"></i><a href="tables-data.php">Réservation</a></li>
                    </ul>
                    </li>
                      <li class="menu-title">Control</li><!-- /.menu-title -->
                    <li class="menu-item-has-children active dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-circle-o"></i>Tables</a>
                      <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-search"></i><a href="table costum.php">Table de control</a></li>
                            <li><i class="menu-icon fa fa-search"></i><a href="table basic.php">Table de recherche</a></li>
                             <li><i class="menu-icon fa fa-search"></i><a href="tablerechercheproduits.php">Table de recherche produit</a></li>
                             <li><i class="menu-icon fa fa-search"></i><a href="tablerecherchecategories.php">Table de recherche catégorie</a></li>



                     
                        </ul>
                    </li>
                     <li class="menu-title">Contact</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Contact</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-phone"></i><a href="tables-Contact.php">Contactez</a></li>
                          
                        </ul>
                    </li>
                    
                    <li class="menu-title">Extras</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">4</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Rachel Santos</span>
                                        <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/user.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-bell-o"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i>Settings</a>

                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title" style="    margin-top: 90px;
">                          <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                      <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Evenements</a></li>
                                    <li><a href="#">Contacts</a></li>
                                    <li class="active">Reservations</li>
                                    
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   



        <div class="content">
            <div class="animated fadeIn">
                <div class="row" style="    margin-left: 26px;
    width: 1901px;
}">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title" style="margin-left: 27px;"> Les Réservations .. </strong>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                   <tr>
                                <td>nom</td>
                                <td>prenom</td>
                                <td>date</td>
                                <td>description</td>
                                <td>email</td>
                                <td>time</td>
                                <td>Phone</td>
                                <td>supprimer</td>
                                </tr>

                                <?PHP
                                foreach($listeReservations as $row){
                                    ?>
                                    <tr>
                                    <td><?PHP echo $row['nom']; ?></td>
                                    <td><?PHP echo $row['prenom']; ?></td>
                                        <td><?PHP echo $row['date']; ?></td>
                                    <td><?PHP echo $row['description']; ?></td>
                                    <td><?PHP echo $row['email']; ?></td>
                                    <td><?PHP echo $row['time']; ?></td>
                                    <td><?PHP echo $row['phone']; ?></td>

                                    
                                    <td><form method="POST" action="supprimerReservation.php">
                                    <button type="submit" name="supprimer" class="buttonblack" style="background-color: #555555; border-radius: 12px; padding: 10px 24px;     width: 120px;  ">Supprimer</button>
                                    <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                                    </form>
                                    </td>
                                    </tr>
                                    <?PHP
                                }
                                ?>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                    <form  method="POST" action="index.html" style="    margin-top: 52px;
}">
                                        <input type="submit" name="Retour" value="Retour" style="    margin-left: -277px;
    margin-top: 254px;" >
                                        </form>
                                    </td>
                    <!--<div class="col-lg-6">
                        <form method="POST" action="ajouterEvenement.php">
<table>
<caption>Ajouter Event</caption>
<tr>
<td>nom</td>
<td><input type="text" name="nom"></td>
</tr>
<tr>
<td>prix</td>
<td><input type="number" name="prix"></td>
</tr>

<tr>
<td></td>
<td><input type="submit" name="ajouter" value="ajouter"></td>
</tr>
</table>
</form>
                    </div>-->
                       

                



<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>
