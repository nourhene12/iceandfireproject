<?php 
session_start();
 include "../core/livreurc.php";
 $update=false;
 	$id1="";
    $nom="";
    $prenom="";
    $cin="";
    $numero="";
 if(isset($_POST['ajouter'])){
 	$nom=$_POST['nom'];
 	$prenom=$_POST['prenom'];
 	$cin=$_POST['cin'];
 	$numero=$_POST['numero'];
 	$livreur1=new livreur($nom,$prenom,$cin,$numero);
 	$livreur1c=new livreurc;
 	$livreur1c->ajouterlivreur($livreur1);
	header('location:index1.php');
	$_SESSION['response']="l'ajout c'est bien effectué!";
	$_SESSION['res_type']="success";
 }
 $livreur2c=new livreurc;
 	$livreur2c->supprimerlivreur();
 if(isset($_GET['edit'])){

 	$id=$_GET['edit'];
 	$livreur0c=new livreurc;
 	$row1=$livreur0c->modifierlivreur($id);
 	$id1=$row1['id'];
    $nom=$row1['nom'];
    $prenom=$row1['prenom'];
    $cin=$row1['cin'];
    $numero=$row1['numero'];
    $update=true;
}
if(isset($_POST['Modifier'])){
    $id1=$_POST['id'];	
    $nom=$_POST['nom'];
 	$prenom=$_POST['prenom'];
 	$cin=$_POST['cin'];
 	$numero=$_POST['numero'];
 	$livreur3c=new livreurc;
 	$livreur3c->modifierlivreur1($nom,$prenom,$cin,$numero,$id1);
$_SESSION['response']="la modification c'est bien effectué!";
  $_SESSION['res_type']="primary";
  header('location:index1.php');
    
}
 if(isset($_GET['details']))
 {
   $id=$_GET['details'];
    $livreur=new livreurc;
  $row=$livreur0c->detailslivreur($id);
 	$vid=$row['id'];
 	$vnom=$row['nom'];
 	$vprenom=$row['prenom'];
 	$vcin=$row['cin'];
 	$vnumero=$row['numero'];
 }

?>
